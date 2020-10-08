<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkCustomCapsSettings extends EverflowApiBase
{
    public function all()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/custom/caps'));
    }

    public function get()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/custom/caps/:setting', [
            'setting' => $this->id(),
        ]));
    }

    public function create($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/custom/caps'), $data);
    }

    public function update($data = [])
    {
        // Gets the IDs
        $settingIds = $this->id();

        // Append setting IDs to $data, must be an array
        $data['network_custom_cap_setting_ids'] = is_array($settingIds) ? $settingIds : [$settingIds];

        return EverflowHttpClient::patch(EverflowHttpClient::route('networks/custom/caps'), $data);
    }
}