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

    public function all($page = null, $pageSize = null)
    {
        // Endpoint we're requesting
        $endpoint = EverflowHttpClient::route('affiliates/alloffers');

        // If no page number is provided, fetch all offers without pagination
        if (is_null($page)) {
            return $this->pageAll($endpoint, 'offers');
        }
        
        // Otherwise, fetch the supplied page number
        return $this->page($endpoint, $page, $pageSize);
    }

    public function allRunnable($page = null, $pageSize = null)
    {
        // Endpoint we're requesting
        $endpoint = EverflowHttpClient::route('affiliates/offersrunnable');

        // If no page number is provided, fetch all offers without pagination
        if (is_null($page)) {
            return $this->pageAll($endpoint, 'offers');
        }
        
        // Otherwise, fetch the supplied page number
        return $this->page($endpoint, $page, $pageSize);
    }

    public function get($relationship = [])
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('affiliates/offers/:offerId', [
            'offerId' => $this->id(),
        ], [
            'relationship' => $relationship,
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