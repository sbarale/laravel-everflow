<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkOffers extends EverflowApiBase
{
    /**
     * Maps endpoints on this API to other APIs
     */
    public $childApis = [
        'tracking' => EverflowNetworkOffersTracking::class,
        'applications' => EverflowNetworkOffersApplications::class,
    ];

    public function all()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/offers'));
    }

    public function get()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/offers/:offerId', [
            'offerId' => $this->id(),
        ]));
    }

    public function create($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/offers'), $data);
    }

    public function update($data = [])
    {
        // Gets the offer IDs
        $offerIds = $this->id();

        if (is_array($offerIds)) {
            // Append offer IDs to $data, must be an array when we're doing a PATCH request
            $data['network_offer_ids'] = $offerIds;

            return EverflowHttpClient::patch(EverflowHttpClient::route('networks/offers/offerstyped'), $data);
        } else {
            return EverflowHttpClient::put(EverflowHttpClient::route('networks/offers/:offerId', [
                'offerId' => $offerIds,
            ]), $data);
        }
    }

    public function patch($data = [], $apply = false)
    {
        if ($apply) {
            EverflowHttpClient::patch(EverflowHttpClient::route('networks/patch/offers/apply'), $data);
        } else {
            EverflowHttpClient::post(EverflowHttpClient::route('networks/patch/offers/submit'), $data);
        }
    }
}