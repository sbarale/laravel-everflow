<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowAffiliateReporting extends EverflowApiBase
{
    public function entity($options = [], $query = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('affiliates/reporting/entity', $query), $options);
    }

    public function sub($subId, $options = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('affiliates/reporting/sub/:subId', [
            'subId' => $subId,
        ]), $options);
    }

    public function daily($options = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('affiliates/reporting/daily'), $options);
    }

    public function offer($options = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('affiliates/reporting/offer'), $options);
    }

    public function conversions($options = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('affiliates/reporting/conversions'), $options);
    }

    public function click($id)
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('affiliates/reporting/clicks/:id', [
            'id' => $id,
        ]));
    }

    public function clicks($options = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('affiliates/reporting/clicks'), $options);
    }

    public function clickstream($options = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('affiliates/reporting/clicks/stream'), $options);
    }

    public function conversion($conversionId)
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('affiliates/reporting/conversions/:conversionId', [
            'conversionId' => $conversionId,
        ]));
    }

    public function events($transactionId)
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('affiliates/reporting/clicks/:transactionId', [
            'transactionId' => $transactionId,
        ]));
    }

    public function summary($options = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('affiliates/dashboard/summary'), $options);
    }

    public function performance($options = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('affiliates/dashboard/performance'), $options);
    }

    public function trendingOffers($options = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('affiliates/dashboard/trending/offers'), $options);
    }

    public function trendingOffer($offerId, $options = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('affiliates/dashboard/trending/offers/:offerId', [
            'offerId' => $offerId
        ]), $options);
    }

    public function referrals($options = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('affiliates/reporting/referrals'), $options);
    }
}
