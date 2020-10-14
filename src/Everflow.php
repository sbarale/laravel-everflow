<?php

namespace CodeGreenCreative\Everflow;

class Everflow
{
    public function as($apiKey)
    {
        // Tells the API client to auth next request with the passed API key
        EverflowHttpClient::authNextRequestAs($apiKey);

        // Allows for function chaining
        return new $this;
    }

    public function asAffiliate($affiliate)
    {
        // Gets the Affiliate's API keys
        $affiliateKeys = $this->network()->affiliates($affiliate)->apikeys()->all();

        // If no user is present, returns error
        if (empty($affiliateKeys->keys)) {
            throw new \Exception("Specified Affiliate does not have any API keys, please check if your Affiliate has valid Users and Keys");
        }

        // Gets the first of the active keys
        $affiliateKey = collect($affiliateKeys->keys)->filter(function ($key) {
            return ('active' == $key->key_status);
        })->first();

        // If no active key is set, returns error
        if (is_null($affiliateKey)) {
            throw new \Exception("Specified Affiliate does have API keys but none are active, please check if your Affiliate has valid Users and Keys");
        }

        // Allows for function chaining
        return $this->as($affiliateKey->api_key);
    }

    public function network()
    {
        return new Api\EverflowNetwork;
    }

    public function metadata()
    {
        return new Api\EverflowMetadata;
    }
    
    public function affiliate()
    {
        return new Api\EverflowAffiliate;
    }

    public function advertiser()
    {
        return new Api\EverflowAdvertiser;
    }
}