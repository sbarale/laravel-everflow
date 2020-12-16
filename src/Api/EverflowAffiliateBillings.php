<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowAffiliateBillings extends EverflowApiBase
{
    public function invoicestable($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('affiliates/billings/affiliates/invoicestable'), $data);
    }
}