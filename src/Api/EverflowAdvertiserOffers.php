<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowAdvertiserOffers extends EverflowApiBase
{
    public function all()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('advertisers/offers'));
    }

    public function get()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('advertisers/offers/:offerId', [
            'offerId' => $this->id(),
        ]));
    }
}