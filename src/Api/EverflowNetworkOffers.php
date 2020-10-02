<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkOffers
{
    public function all()
    {
        return EverflowHttpClient::get('networks/offers');
    }

    public function get($offerId)
    {
        return EverflowHttpClient::get('networks/offers/' . $offerId);
    }

    public function add($data = [])
    {
        return EverflowHttpClient::post('networks/offers', $data);
    }

    public function update($offerIds, $data = [])
    {
        if (is_array($offerIds)) {
            // Append offer IDs to $data, must be an array when we're doing a PATCH request
            $data['network_offer_ids'] = $offerIds;

            return EverflowHttpClient::patch('networks/offers/offerstyped', $data);
        } else {
            return EverflowHttpClient::patch('networks/offers/' . $offerIds, $data);
        }
    }
}