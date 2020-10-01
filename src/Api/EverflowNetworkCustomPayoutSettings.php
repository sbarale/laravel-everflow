<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkCustomPayoutSettings
{
    public function all()
    {
        return EverflowHttpClient::get('networks/custom/payoutrevenue');
    }

    public function get($settingId)
    {
        return EverflowHttpClient::get('networks/custom/payoutrevenue/' . $settingId);
    }

    public function add($data = [])
    {
        return EverflowHttpClient::post('networks/custom/payoutrevenue', $data);
    }

    public function update($settingIds, $data = [])
    {
        if (is_array($settingIds)) {
            // Append setting IDs to $data
            $data['network_custom_payout_revenue_setting_ids'] = $settingIds;

            return EverflowHttpClient::patch('networks/custom/payoutrevenue', $data);
        } else {
            return EverflowHttpClient::put('networks/custom/payoutrevenue/' . $settingId, $data);
        }
    }

    public function delete($settingIds)
    {
        return EverflowHttpClient::delete('networks/custom/payoutrevenue/' . $settingId);
    }
}