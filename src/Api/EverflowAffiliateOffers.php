<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;
use CodeGreenCreative\Everflow\Traits\HasPagination;

class EverflowAffiliateOffers extends EverflowApiBase
{
    use HasPagination;

    /**
     * Maps endpoints on this API to other APIs
     */
    public $childApis = [
        'traffic' => EverflowAffiliateOffersTraffic::class,
    ];

    public function all()
    {
        return $this->pageAll(EverflowHttpClient::route('affiliates/alloffers'), 'offers');
    }

    public function allRunnable()
    {
        return $this->pageAll(EverflowHttpClient::route('affiliates/offersrunnable'), 'offers');
    }

    public function get($relationships = [])
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('affiliates/offers/:offerId', [
            'offerId' => $this->id(),
        ], [
            'relationships' => $relationships,
        ]));
    }

    public function trackingUrl($urlId = 0)
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('affiliates/offers/:offerId/url/:urlId', [
            'offerId' => $this->id(),
            'urlId' => $urlId,
        ]));
    }

    public function impressionUrl($urlId = 0)
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('affiliates/offers/:offerId/impressionurl/:urlId', [
            'offerId' => $this->id(),
            'urlId' => $urlId,
        ]));
    }

    public function createApplication($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('affiliates/offers/:offerId/application', [
            'offerId' => $this->id(),
        ]), $data);
    }
}