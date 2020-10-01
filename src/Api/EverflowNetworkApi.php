<?php

namespace CodeGreenCreative\Everflow\Api;

class EverflowNetworkApi
{
    public function labels()
    {
        return new EverflowNetworkLabels;
    }
    
    public function custom()
    {
        return new EverflowNetworkCustomSettings;
    }
    
    public function domains()
    {
        return new EverflowNetworkDomainsSettings;
    }
    
    public function offers()
    {
        return new EverflowNetworkOffers;
    }
    
    public function campaigns()
    {
        return new EverflowNetworkCampaigns;
    }
    
    public function creatives()
    {
        return new EverflowNetworkCreatives;
    }
    
    public function affiliates()
    {
        return new EverflowNetworkAffiliates;
    }
    
    public function postbacks()
    {
        return new EverflowNetworkPostbacks;
    }
    
    public function advertisers()
    {
        return new EverflowNetworkAdvertisers;
    }
    
    public function reporting()
    {
        return new EverflowNetworkReportingApi;
    }
}