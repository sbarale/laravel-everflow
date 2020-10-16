<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkAffiliates extends EverflowApiBase
{
    /**
     * Maps endpoints on this API to other APIs
     */
    public $childApis = [
        'users' => EverflowNetworkAffiliatesUsers::class,
        'apikeys' => EverflowNetworkAffiliatesKeys::class,
        'domains' => EverflowNetworkAffiliatesDomains::class,
    ];

    public function all()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/affiliates'));
    }

    public function get()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/affiliates/:affiliateId', [
            'affiliateId' => $this->id(),
        ]));
    }

    public function create($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/affiliates'), $data);
    }

    public function signup($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/affiliates/signup'), $data);
    }

    public function update($data = [])
    {
        return EverflowHttpClient::put(EverflowHttpClient::route('networks/affiliates/:affiliateId', [
            'affiliateId' => $this->id(),
        ]), $data);
    }
}