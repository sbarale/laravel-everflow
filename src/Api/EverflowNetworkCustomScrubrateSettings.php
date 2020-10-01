<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkCustomScrubrateSettings
{
    public function all()
    {
        return EverflowHttpClient::get('networks/custom/scrubrate');
    }

    public function get($settingId)
    {
        return EverflowHttpClient::get('networks/custom/scrubrate/' . $settingId);
    }

    public function add($data = [])
    {
        return EverflowHttpClient::post('networks/custom/scrubrate', $data);
    }

    public function update($settingIds, $data = [])
    {
        if (is_array($settingIds)) {
            // Append setting IDs to $data
            $data['network_custom_scrub_rate_setting_ids'] = $settingIds;

            return EverflowHttpClient::patch('networks/custom/scrubrate', $data);
        } else {
            return EverflowHttpClient::put('networks/custom/scrubrate/' . $settingId, $data);
        }
    }

    public function delete($settingIds)
    {
        return EverflowHttpClient::delete('networks/custom/scrubrate/' . $settingId);
    }
}