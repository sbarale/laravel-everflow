<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkCustomCapsSettings
{
    public function all()
    {
        return EverflowHttpClient::get('networks/custom/caps');
    }

    public function get($settingId)
    {
        return EverflowHttpClient::get('networks/custom/caps/' . $settingId);
    }

    public function add($data = [])
    {
        return EverflowHttpClient::post('networks/custom/caps', $data);
    }

    public function update($settingIds, $data = [])
    {
        // Append setting IDs to $data, must be an array
        $data['network_custom_cap_setting_ids'] = is_array($settingIds) ? $settingIds : [$settingIds];

        return EverflowHttpClient::patch('networks/custom/caps', $data);
    }
}