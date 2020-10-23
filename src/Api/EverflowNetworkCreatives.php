<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;
use CodeGreenCreative\Everflow\Traits\HasPagination;

class EverflowNetworkCreatives extends EverflowApiBase
{
    use HasPagination;

    public function all()
    {
        return $this->pageAll(EverflowHttpClient::route('networks/creatives'), 'creatives');
    }

    public function get($creativeId)
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/creatives/:creativeId', [
            'creativeId' => $creativeId
        ]));
    }
}