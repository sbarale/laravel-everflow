<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkCustomCreativeSettings extends EverflowApiBase
{
    public function all()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/custom/creative'));
    }

    public function get()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/custom/creative/:setting', [
            'setting' => $this->id(),
        ]));
    }

    public function create($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/custom/creative'), $data);
    }

    public function update($data = [])
    {
        // Gets the IDs
        $settingIds = $this->id();

        if (is_array($settingIds)) {
            // Append setting IDs to $data
            $data['custom_creative_setting_ids'] = $settingIds;

            return EverflowHttpClient::patch(EverflowHttpClient::route('networks/custom/creative'), $data);
        } else {
            return EverflowHttpClient::put(EverflowHttpClient::route('networks/custom/creative/:setting', [
                'setting' => $settingId,
            ]), $data);
        }
    }

    public function delete()
    {
        return EverflowHttpClient::delete(EverflowHttpClient::route('networks/custom/creative/:setting', [
            'setting' => $this->id(),
        ]));
    }
}