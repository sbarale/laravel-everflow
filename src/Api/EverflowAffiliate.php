<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;

class EverflowAffiliate extends EverflowApiBase
{
    /**
     * Maps endpoints on this API to other APIs
     */
    public $childApis = [
        'offers' => EverflowAffiliateOffers::class,
        'reporting' => EverflowAffiliateReporting::class,
        'pixels' => EverflowAffiliatePixels::class
    ];
}
