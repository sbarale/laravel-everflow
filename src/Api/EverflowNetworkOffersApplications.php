<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkOffersApplications extends EverflowApiBase
{
    public function all()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/applications'));
    }

    public function update($data = [])
    {
        return EverflowHttpClient::patch(EverflowHttpClient::route('networks/applications'), $data);
    }
}