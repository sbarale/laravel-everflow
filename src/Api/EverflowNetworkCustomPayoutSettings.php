<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkCustomPayoutSettings extends EverflowApiBase
{
    public function all()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/custom/payoutrevenue'));
    }

    public function get()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/custom/payoutrevenue/:setting', [
            'setting' => $this->id(),
        ]));
    }

    public function create($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/custom/payoutrevenue'), $data);
    }

    public function update($data = [])
    {
        // Gets the IDs
        $settingIds = $this->id();

        if (is_array($settingIds)) {
            // Append setting IDs to $data
            $data['network_custom_payout_revenue_setting_ids'] = $settingIds;

            return EverflowHttpClient::patch(EverflowHttpClient::route('networks/custom/payoutrevenue'), $data);
        } else {
            return EverflowHttpClient::put(EverflowHttpClient::route('networks/custom/payoutrevenue/:setting', [
                'setting' => $settingId,
            ]), $data);
        }
    }

    public function delete()
    {
        return EverflowHttpClient::delete(EverflowHttpClient::route('networks/custom/payoutrevenue/:setting', [
            'setting' => $this->id(),
        ]));
    }
}