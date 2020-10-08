<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkCustomScrubrateSettings extends EverflowApiBase
{
    public function all()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/custom/scrubrate'));
    }

    public function get($settingId)
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/custom/scrubrate/:setting', [
            'setting' => $this->id(),
        ]));
    }

    public function create($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/custom/scrubrate'), $data);
    }

    public function update($data = [])
    {
        // Gets the IDs
        $settingIds = $this->id();

        if (is_array($settingIds)) {
            // Append setting IDs to $data
            $data['network_custom_scrub_rate_setting_ids'] = $settingIds;

            return EverflowHttpClient::patch(EverflowHttpClient::route('networks/custom/scrubrate'), $data);
        } else {
            return EverflowHttpClient::put(EverflowHttpClient::route('networks/custom/scrubrate/:setting', [
                'setting' => $settingId,
            ]), $data);
        }
    }

    public function delete()
    {
        return EverflowHttpClient::delete(EverflowHttpClient::route('networks/custom/scrubrate/:setting', [
            'setting' => $this->id(),
        ]));
    }
}