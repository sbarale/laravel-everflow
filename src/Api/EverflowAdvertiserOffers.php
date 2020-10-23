<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;
use CodeGreenCreative\Everflow\Traits\HasPagination;

class EverflowAdvertiserOffers extends EverflowApiBase
{
    use HasPagination;

    public function all()
    {
        return $this->pageAll(EverflowHttpClient::route('advertisers/offers'), 'offers');
    }

    public function get()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('advertisers/offers/:offerId', [
            'offerId' => $this->id(),
        ]));
    }
}