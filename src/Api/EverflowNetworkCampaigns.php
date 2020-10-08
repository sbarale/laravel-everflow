<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkCampaigns extends EverflowApiBase
{
    public function all()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/campaigns'));
    }

    public function get($campaignId)
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/campaigns/:campaignId', [
            'campaignId' => $campaignId
        ]));
    }

    public function create($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/campaigns'), $data);
    }

    public function update($data = [])
    {
        return EverflowHttpClient::put(EverflowHttpClient::route('networks/campaigns/:campaignId', [
            'campaignId' => $this->id(),
        ]), $data);
    }
}