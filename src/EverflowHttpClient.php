<?php

namespace CodeGreenCreative\Everflow;

class EverflowHttpClient
{
    private const BASE_URL = 'https://api.eflow.team/v1/';

    private static $nextApiKeys = [];

    private static function nextApiKey()
    {
        // Gets next API key from the queue
        $nextApiKey = array_pop(static::$nextApiKeys);

        // If no API key is used, get from the package's config
        if (is_null($nextApiKey)) {
            $nextApiKey = config('everflow.api_key');
        }

        // Returns the final API key
        return $nextApiKey;
    }

    public static function authNextRequestAs($apiKey)
    {
        array_push(static::$nextApiKeys, $apiKey);
    }

    public static function request($method, $url, $data = [], $options = [])
    {
        // Start a new cURL session
        $handle = curl_init(static::BASE_URL . $url);

        // Setup base cURL options
        curl_setopt_array($handle, $options);
        curl_setopt_array($handle, [
            CURLOPT_HEADER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_CONNECTTIMEOUT => 60,
            CURLOPT_TIMEOUT => 120,
        ]);

        // Setup HTTP method
        switch (strtolower($method)) {
            // HTTP POST
            case 'post':
                curl_setopt($handle, CURLOPT_POST, true);
                break;

            // HTTP PUT
            case 'put':
                curl_setopt($handle, CURLOPT_PUT, true);
                break;

            // HTTP PATCH
            case 'patch':
                curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'PATCH');
                break;

            // HTTP DELETE
            case 'delete':
                curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'DELETE');
                break;

            // HTTP GET
            case 'get':
            default:
                curl_setopt($handle, CURLOPT_HTTPGET, true);
                break;
        }

        // Setup request headers
        $headers = array_merge(
            isset($options[CURLOPT_HTTPHEADER]) ? $options[CURLOPT_HTTPHEADER] : [],
            array(
                'Accept: application/json',
                'X-Eflow-API-Key: ' . static::nextApiKey(),
                'Cache-Control: no-cache',
                'Pragma: no-cache',
            )
        );

        // If any $data is set, add fields
        if (!empty($data)) {
            $headers[] = 'Content-Type: application/json';
            curl_setopt($handle, CURLOPT_POSTFIELDS, json_encode($data));
        }

        // Apply request headers
        curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);

        // Executes request
        $responseRaw = curl_exec($handle);

        // Debugging only
        /*fwrite(
            (defined('STDERR') ? STDERR : fopen('php://output', 'w')),

            // Request method + URL
            $method . ' ' . static::BASE_URL . $url . "\n\n" .

            // Request headers
            print_r($headers, true) . "\n\n" .

            // Request body (if any)
            (empty($data) ? '' : print_r($data, true) . "\n\n")  .

            // Server response
            "--------------------------\n\n" .
            $responseRaw . "\n\n"
        );*/

        // Extracts response body and headers
        $responseHeaderSize = curl_getinfo($handle, CURLINFO_HEADER_SIZE);
        $responseHeaders = substr($responseRaw, 0, $responseHeaderSize);
        $responseHeadersArr = array_map('trim', explode("\n", trim($responseHeaders)));
        $responseHeader0 = array_shift($responseHeadersArr);
        $responseStatus = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        $responseBody = substr($responseRaw, $responseHeaderSize);

        // Detects any 5XX errors and handles them
        if ('5' == strval($responseStatus)[0]) {
            throw new \Exception("Internal error on Everflow API [{$responseHeader0}] with the following body:\n{$responseBody}");
        }

        // Handles cURL request errors
        if (curl_error($handle)) {
            throw new \Exception('Error connecting to Everflow API: ' . curl_error($handle));
        }

        // Parses response JSON
        $response = json_decode($responseBody);

        // Handles Everflow errors
        if (isset($response->Error)) {
            throw new \Exception('Error from Everflow API: ' . $response->Error);
        }
        
        // Done
        return $response;
    }

    public static function route($route, $data = [], $query = []) {
        // Replaces route fragments
        $search = [];
        $replace = [];
        foreach ($data as $k => $v) {
            $search[] = ':' . $k;
            $replace[] = urlencode($v);
        }

        // Handles query string parameters
        $queryParameters = [];
        foreach ($query as $k => $v) {
            if (is_array($v)) {
                // Handles arrays in values
                $vEncoded = implode(',', array_map('urlencode', $v));
            } else {
                // Encodes all other types of values
                $vEncoded = urlencode($v);
            }

            // Adds finished items
            $queryParameters[] = urlencode($k) . '=' . $vEncoded;
        }

        // Builds query string if needed
        $queryString = (count($query) > 0) ? ('?' . implode('&', $queryParameters)) : '';

        // Returns built URL
        return str_replace($search, $replace, $route) . $queryString;
    }

    public static function get($url, $options = [])
    {
        return static::request('GET', $url, [], $options);
    }

    public static function post($url, $data = [], $options = [])
    {
        return static::request('POST', $url, $data, $options);
    }

    public static function put($url, $data = [], $options = [])
    {
        return static::request('PUT', $url, $data, $options);
    }

    public static function delete($url, $data = [], $options = [])
    {
        return static::request('DELETE', $url, $data, $options);
    }

    public static function patch($url, $data = [], $options = [])
    {
        return static::request('PATCH', $url, $data, $options);
    }
}