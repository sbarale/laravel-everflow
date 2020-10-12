<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;

class EverflowAdvertiserReporting extends EverflowApiBase
{
    public function entity($options = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('advertisers/reporting/entity'), $options);
    }

    public function conversions($options = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('advertisers/reporting/conversions'), $options);
    }

    public function conversion($conversionId)
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('advertisers/reporting/conversions/:conversionId', [
            'conversionid' => $conversionId,
        ]));
    }

    public function events($transactionId)
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('advertisers/reporting/events/:transactionId', [
            'transactionId' => $transactionId,
        ]));
    }
}