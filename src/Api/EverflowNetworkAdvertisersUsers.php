<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkAdvertisersUsers extends EverflowApiBase
{
    public function all()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/advertisers/:advertiserId/users'));
    }

    public function get()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/advertisers/:advertiserId/users/:userId', [
            'advertiserId' => $this->parent(EverflowNetworkAdvertisers::class)->id(),
            'userId' => $this->id(),
        ]));
    }

    public function create($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/advertisers/:advertiserId/users'), $data);
    }

    public function update($data = [])
    {
        return EverflowHttpClient::put(EverflowHttpClient::route('networks/advertisers/:advertiserId/users/:userId', [
            'advertiserId' => $this->parent(EverflowNetworkAdvertisers::class)->id(),
            'userId' => $this->id(),
        ]), $data);
    }
}