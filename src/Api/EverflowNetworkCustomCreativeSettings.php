<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkCustomCreativeSettings
{
    public function all()
    {
        return EverflowHttpClient::get('networks/custom/creative');
    }

    public function get($settingId)
    {
        return EverflowHttpClient::get('networks/custom/creative/' . $settingId);
    }

    public function add($data = [])
    {
        return EverflowHttpClient::post('networks/custom/creative', $data);
    }

    public function update($settingIds, $data = [])
    {
        if (is_array($settingIds)) {
            // Append setting IDs to $data
            $data['custom_creative_setting_ids'] = $settingIds;

            return EverflowHttpClient::patch('networks/custom/creative', $data);
        } else {
            return EverflowHttpClient::put('networks/custom/creative/' . $settingId, $data);
        }
    }

    public function delete($settingIds)
    {
        return EverflowHttpClient::delete('networks/custom/creative/' . $settingId);
    }
}