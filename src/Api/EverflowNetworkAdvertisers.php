<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkAdvertisers extends EverflowApiBase
{
    /**
     * Maps endpoints on this API to other APIs
     */
    public $childApis = [
        'users' => EverflowNetworkAdvertisersUsers::class,
    ];

    public function all()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/advertisers'));
    }

    public function get($advertiserId)
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/advertisers/:advertiserId', [
            'advertiserId' => $advertiserId
        ]));
    }

    public function create($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/advertisers'), $data);
    }

    public function update($data = [])
    {
        return EverflowHttpClient::put(EverflowHttpClient::route('networks/advertisers/:advertiserId', [
            'advertiserId' => $this->id(),
        ]), $data);
    }
}