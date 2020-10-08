<?php

namespace CodeGreenCreative\Everflow;

class Everflow
{
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