<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowAffiliateBillings extends EverflowApiBase
{
    public function invoicestable($data = [])
    {
        $page = isset($data['page']) ? $data['page'] : 1;
        $page_size = isset($data['page_size']) ? $data['page_size'] : config('everflow.per_page');

        return EverflowHttpClient::post(EverflowHttpClient::route('affiliates/billings/affiliates/invoicestable', [], [
            'page' => $page,
            'page_size' => $page_size,
        ]), $data);
    }

    public function summary($data = [])
    {
        $page = isset($data['page']) ? $data['page'] : 1;
        $page_size = isset($data['page_size']) ? $data['page_size'] : config('everflow.per_page');

        return EverflowHttpClient::post(EverflowHttpClient::route('affiliates/billings/affiliates/summary', [], [
            'page' => $page,
            'page_size' => $page_size,
        ]), $data);
    }
}