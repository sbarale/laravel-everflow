<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkDomainsSettings extends EverflowApiBase
{
    public function all()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/domains/tracking'));
    }

    public function get()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/domains/tracking/', [
            'domainId' => $this->id(),
        ]));
    }
}