<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;

class EverflowAdvertiser extends EverflowApiBase
{
    /**
     * Maps endpoints on this API to other APIs
     */
    public $childApis = [
        'offers' => EverflowAdvertiserOffers::class,
        'reporting' => EverflowAdvertiserReporting::class,
    ];
}