<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;

class EverflowNetworkApi extends EverflowApiBase
{
    /**
     * Maps endpoints on this API to other APIs
     */
    public $childApis = [
        'labels' => EverflowNetworkLabels::class,
        'custom' => EverflowNetworkCustomSettings::class,
        'domains' => EverflowNetworkDomainsSettings::class,
        'offers' => EverflowNetworkOffers::class,
        'campaigns' => EverflowNetworkCampaigns::class,
        'creatives' => EverflowNetworkCreatives::class,
        'affiliates' => EverflowNetworkAffiliates::class,
        'postbacks' => EverflowNetworkPostbacks::class,
        'advertisers' => EverflowNetworkAdvertisers::class,
        'reporting' => EverflowNetworkReportingApi::class,
    ];
}