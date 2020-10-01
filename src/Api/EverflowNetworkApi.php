<?php

namespace CodeGreenCreative\Everflow\Api;

class EverflowNetworkApi
{
    public function labels()
    {
        return new EverflowNetworkLabelsApi;
    }
    
    public function custom()
    {
        return new EverflowNetworkCustomSettingsApi;
    }
    
    public function settings()
    {
        return new EverflowNetworkSettingsApi;
    }
    
    public function offers()
    {
        return new EverflowNetworkOffersApi;
    }
    
    public function campaigns()
    {
        return new EverflowNetworkCampaignsApi;
    }
    
    public function creatives()
    {
        return new EverflowNetworkCreativesApi;
    }
    
    public function affiliates()
    {
        return new EverflowNetworkAffiliatesApi;
    }
    
    public function postbacks()
    {
        return new EverflowNetworkPostbacksApi;
    }
    
    public function advertisers()
    {
        return new EverflowNetworkAdvertisersApi;
    }
    
    public function reporting()
    {
        return new EverflowNetworkReportingApi;
    }
}