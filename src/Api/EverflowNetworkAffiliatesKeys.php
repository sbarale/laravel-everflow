<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkAffiliatesKeys extends EverflowApiBase
{
    public function all()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/affiliates/:affiliateId/apikeys', [
            'affiliateId' => $this->parent(EverflowNetworkAffiliates::class)->id(),
        ]));
    }

    public function create()
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/apikey'), [
            'resource_id' => $this->parent(EverflowNetworkAffiliates::class)->id(),
            'resource_type' => 'affiliate',
        ]);
    }
}