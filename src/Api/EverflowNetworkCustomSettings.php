<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkCustomSettings extends EverflowApiBase
{
    /**
     * Maps endpoints on this API to other APIs
     */
    public $childApis = [
        'caps' => EverflowNetworkCustomCapsSettings::class,
        'scrubrate' => EverflowNetworkCustomScrubrateSettings::class,
        'payout' => EverflowNetworkCustomPayoutSettings::class,
        'creative' => EverflowNetworkCustomCreativeSettings::class,
    ];
}