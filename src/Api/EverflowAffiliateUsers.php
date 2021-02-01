<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowAffiliateUsers extends EverflowApiBase
{
    public function update($data = [])
    {
        return EverflowHttpClient::put(EverflowHttpClient::route('affiliates/users/:userId', [
            'userId' => $this->id(),
        ]), $data);
    }
}
