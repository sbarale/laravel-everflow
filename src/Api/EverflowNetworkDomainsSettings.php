<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkDomainsSettings
{
    public function all()
    {
        return EverflowHttpClient::get('networks/domains/tracking');
    }

    public function get($domain)
    {
        return EverflowHttpClient::get('networks/domains/tracking/' . $domain);
    }
}