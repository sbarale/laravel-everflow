<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkAffiliatesUsers extends EverflowApiBase
{
    public function all()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/affiliates/:affiliateId/users'));
    }

    public function get()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/affiliates/:affiliateId/users/:userId', [
            'affiliateId' => $this->parent(EverflowNetworkAffiliates::class)->id(),
            'userId' => $this->id(),
        ]));
    }

    public function create($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/affiliates/:affiliateId/users'), $data);
    }

    public function update($data = [])
    {
        return EverflowHttpClient::put(EverflowHttpClient::route('networks/affiliates/:affiliateId/users/:userId', [
            'affiliateId' => $this->parent(EverflowNetworkAffiliates::class)->id(),
            'userId' => $this->id(),
        ]), $data);
    }
}