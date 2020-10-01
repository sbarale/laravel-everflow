<?php

namespace CodeGreenCreative\Everflow;

class Everflow
{
    public function network()
    {
        return new Api\EverflowNetworkApi;
    }

    public function metadata()
    {
        return new Api\EverflowMetadataApi;
    }
    
    public function affiliate()
    {
        return new Api\EverflowAffiliateApi;
    }

    public function advertiser()
    {
        return new Api\EverflowAdvertiserApi;
    }
}