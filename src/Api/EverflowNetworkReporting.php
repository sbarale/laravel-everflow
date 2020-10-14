<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkReporting extends EverflowApiBase
{
    public function summary()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/dashboard/summary'));
    }

    public function entity($options = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/reporting/entity'), $options);
    }

    public function conversion($conversionId)
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/reporting/conversions/:conversionId', [
            'conversionId' => $conversionId
        ]));
    }

    public function conversions($options = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/reporting/conversions'), $options);
    }

    public function postconversions($options = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/reporting/postconversions'), $options);
    }

    public function click($transactionId)
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/reporting/clicks/:transactionId', [
            'transactionId' => $transactionId
        ]));
    }

    public function clicks()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/reporting/clicks'));
    }

    public function clickstream($options = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/reporting/clicks/stream'), $options);
    }

    public function transaction($transactionId)
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/reporting/transactions/:transactionId', [
            'transactionId' => $transactionId
        ]));
    }

    public function variance($options = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/reporting/variance'), $options);
    }

    public function performance($options = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/dashboard/performance'), $options);
    }
}