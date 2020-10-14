<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowAffiliateOffersTraffic extends EverflowApiBase
{
    public function controls()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('affiliates/trafficcontrols'));
    }

    public function control($controlId)
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('affiliates/trafficcontrols/:controlId', [
            'controlId' => $controlId,
        ]));
    }

    public function blocking()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('affiliates/trafficblocking'));
    }

    public function blockingStream($options = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('affiliates/blockedvariables'), $options);
    }
}