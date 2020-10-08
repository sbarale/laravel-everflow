<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkOffersTracking extends EverflowApiBase
{
    /**
     * Maps endpoints on this API to other APIs
     */
    public $childApis = [
        'domain' => EverflowNetworkOffersTrackingDomain::class,
        'coupon' => EverflowNetworkOffersCouponCodes::class,
    ];

    public function clicks($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/tracking/offers/clicks'), $data);
    }

    public function clicksOnCampaign($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/tracking/campaigns/clicks'), $data);
    }

    public function clicksOnTest($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/tracking/campaigns/clicks/test'), $data);
    }

    public function impressions($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/tracking/offers/impressions'), $data);
    }

    public function impressionsOnTest($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/tracking/offers/impressions/test'), $data);
    }
}