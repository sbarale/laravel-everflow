<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;

class EverflowAffiliateOffersTraffic extends EverflowApiBase
{
    public function controls()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/affiliates/trafficcontrols'));
    }

    public function control($controlId)
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/affiliates/trafficcontrols/:controlId', [
            'controlId' => $controlId,
        ]));
    }

    public function blocking()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/affiliates/trafficblocking'));
    }

    public function blockingStream($options = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/affiliates/blockedvariables'), $options);
    }
}