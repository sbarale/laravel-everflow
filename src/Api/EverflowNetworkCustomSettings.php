<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkCustomSettings
{
    public function caps()
    {
        return new EverflowNetworkCustomCapsSettings;
    }

    public function scrubrate()
    {
        return new EverflowNetworkCustomScrubrateSettings;
    }

    public function payout()
    {
        return new EverflowNetworkCustomPayoutSettings;
    }

    public function creative()
    {
        return new EverflowNetworkCustomCreativeSettings;
    }
}