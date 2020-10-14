<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowAffiliateReporting extends EverflowApiBase
{
    public function entity($options = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('affiliates/reporting/entity'), $options);
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
            'conversionid' => $conversionId,
        ]));
    }

    public function events($transactionId)
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('affiliates/reporting/clicks/:transactionId', [
            'transactionId' => $transactionId,
        ]));
    }
}