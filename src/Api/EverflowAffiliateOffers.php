<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;

class EverflowAffiliateOffers extends EverflowApiBase
{
    /**
     * Maps endpoints on this API to other APIs
     */
    public $childApis = [
        'traffic' => EverflowAffiliateOffersTraffic::class,
    ];

    public function all()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/affiliates/offers'));
    }

    public function allRunnable()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/affiliates/offersrunnable'));
    }

    public function get()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/affiliates/offers/:offerId', [
            'offerId' => $this->id(),
        ]));
    }

    public function trackingUrl($urlId = 0)
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/affiliates/offers/:offerId/url/:urlId', [
            'offerId' => $this->id(),
            'urlId' => $urlId,
        ]));
    }

    public function impressionUrl($urlId = 0)
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/affiliates/offers/:offerId/impressionurl/:urlId', [
            'offerId' => $this->id(),
            'urlId' => $urlId,
        ]));
    }

    public function createApplication($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/affiliates/offers/:offerId/application', [
            'offerId' => $this->id(),
        ]), $data);
    }
}