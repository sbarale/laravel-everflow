<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkCreatives extends EverflowApiBase
{
    public function all()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/creatives'));
    }

    public function get($creativeId)
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/creatives/:creativeId', [
            'creativeId' => $creativeId
        ]));
    }
}