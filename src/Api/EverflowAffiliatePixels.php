<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowAffiliatePixels extends EverflowApiBase
{
    public function all()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('affiliates/pixels'));
    }

    public function get()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('affiliates/pixels/:pixelId', [
            'pixelId' => $this->id(),
        ]));
    }

    public function create($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('affiliates/pixels'), $data);
    }

    public function update($data = [])
    {
        return EverflowHttpClient::put(EverflowHttpClient::route('affiliates/pixels/:pixelId', [
            'pixelId' => $this->id(),
        ]), $data);
    }
}
