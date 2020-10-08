<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkOffersTrackingDomain extends EverflowApiBase
{
    public function url($affiliateId, $urlId)
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/offers/:offerId/trackingdomain/:domainId/url/:affiliateId/:urlId', [
            'offerId' => $this->parent(EverflowNetworkOffers::class)->id(),
            'domainId' => $this->id(),
            'affiliateId' => $affiliateId,
            'urlId' => $urlId,
        ]));
    }
    
    public function urls($urlId = 0)
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/offers/:offerId/trackingdomain/:domainId/urls/:urlId', [
            'offerId' => $this->parent(EverflowNetworkOffers::class)->id(),
            'domainId' => $this->id(),
            'urlId' => $urlId,
        ]));
    }
}