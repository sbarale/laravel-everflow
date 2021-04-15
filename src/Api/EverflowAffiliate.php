<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowAffiliate extends EverflowApiBase
{
    /**
     * Maps endpoints on this API to other APIs
     */
    public $childApis = [
        'offers'    => EverflowAffiliateOffers::class,
        'billing'   => EverflowAffiliateBillings::class,
        'reporting' => EverflowAffiliateReporting::class,
        'users'     => EverflowAffiliateUsers::class,
        'pixels'    => EverflowAffiliatePixels::class
    ];

    public function current($relationship = [])
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('affiliates/affiliate', [], [
            'relationship' => $relationship,
        ]));
    }

    public function network($query = [])
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('affiliates/network', [], $query));
    }

    public function timezone()
    {
        return $this->network('all')->timezone_id;
    }

    public function address()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('affiliates/address'));
    }

    public function billings()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('affiliates/billings'));
    }
}
