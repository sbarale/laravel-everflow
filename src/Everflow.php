<?php

namespace CodeGreenCreative\Everflow;

class Everflow extends EverflowApiBase
{
    /**
     * Maps endpoints on this API to other APIs
     */
    public $childApis = [
        'helpers' => Api\EverflowHelpers::class,
        'network' => Api\EverflowNetwork::class,
        'metadata' => Api\EverflowMetadata::class,
        'affiliate' => Api\EverflowAffiliate::class,
        'advertiser' => Api\EverflowAdvertiser::class,
        'experimental' => Api\Experimental\EverflowExperimental::class,
    ];
}