<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkOffersCouponCodes extends EverflowApiBase
{
    public function url()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/couponcodes/:couponCodeId/trackingurl', [
            'couponCodeId' => $this->id(),
        ]));
    }
}