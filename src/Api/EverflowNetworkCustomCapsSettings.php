<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;
use CodeGreenCreative\Everflow\Traits\HasPagination;

class EverflowNetworkCustomCapsSettings extends EverflowApiBase
{
    use HasPagination;

    public function all()
    {
        return $this->pageAll(EverflowHttpClient::route('networks/custom/caps'), 'custom_cap_settings');
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