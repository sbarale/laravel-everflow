<?php

namespace CodeGreenCreative\Everflow;

class Everflow
{
    public function as($apiKey)
    {
        // Tells the API client to auth next request with the passed API key
        EverflowHttpClient::authNextRequestAs($apiKey);

        // Allows for function chaining
        return new static;
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