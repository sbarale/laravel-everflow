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

    public function asAffiliate($affiliate, $affiliateUserId = null)
    {
        // If no Affiliate user ID is set, get the token for the first available one
        if (is_null($affiliateUserId)) {
            // Gets the affiliate with the current API token
            $affiliateUsers = $this->network()->affiliates($affiliate)->users()->all();

            // Sets the user ID to first found user
            $affiliateToken = $affiliateUsers->users[0]->relationship->api->api_key;
        } else {
            // If the user is set, only gets the user and their token
            $affiliateUser = $this->network()->affiliates($affiliate)->users($affiliateUserId)->get();

            // Sets the user ID to first found user
            $affiliateToken = $affiliateUser->relationship->api->api_key;
        }

        // Allows for function chaining
        return new $this->as($affiliateToken);
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