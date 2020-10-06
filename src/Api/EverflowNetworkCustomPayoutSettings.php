<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkCustomPayoutSettings extends EverflowApiBase
{
    public function all()
    {
        return EverflowHttpClient::get('networks/custom/payoutrevenue');
    }

    public function get()
    {
        return EverflowHttpClient::get('networks/custom/payoutrevenue/' . $this->id());
    }

    public function create($data = [])
    {
        return EverflowHttpClient::post('networks/custom/payoutrevenue', $data);
    }

    public function update($data = [])
    {
        // Gets the IDs
        $settingIds = $this->id();

        if (is_array($settingIds)) {
            // Append setting IDs to $data
            $data['network_custom_payout_revenue_setting_ids'] = $settingIds;

            return EverflowHttpClient::patch('networks/custom/payoutrevenue', $data);
        } else {
            return EverflowHttpClient::put('networks/custom/payoutrevenue/' . $settingId, $data);
        }
    }

    public function delete()
    {
        return EverflowHttpClient::delete('networks/custom/payoutrevenue/' . $this->id());
    }
}