<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkPostbacks extends EverflowApiBase
{
    public function all()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/pixels'));
    }

    public function get()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/pixels/:pixelId', [
            'pixelId' => $this->id(),
        ]));
    }

    public function create($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/pixels'), $data);
    }

    public function update($data = [])
    {
        return EverflowHttpClient::put(EverflowHttpClient::route('networks/pixels/:pixelId', [
            'pixelId' => $this->id(),
        ]), $data);
    }
}