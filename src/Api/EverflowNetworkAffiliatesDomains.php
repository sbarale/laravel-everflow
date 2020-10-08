<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkAffiliatesDomains extends EverflowApiBase
{
    public function all()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/affiliates/:affiliateId/trackingdomains'));
    }

    public function get()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/affiliates/:affiliateId/trackingdomains/:trackingDomainId', [
            'affiliateId' => $this->parent(EverflowNetworkAffiliates::class)->id(),
            'trackingDomainId' => $this->id(),
        ]));
    }

    public function create($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/affiliates/:affiliateId/trackingdomains'), $data);
    }

    public function update($data = [])
    {
        if (is_array($this->id())) {
            // When updating multiple domains, we need to pass this parameter
            $data['network_affiliate_tracking_domain_ids'] = $this->id();

            return EverflowHttpClient::patch(EverflowHttpClient::route('networks/affiliates/:affiliateId/trackingdomains', [
                'affiliateId' => $this->parent(EverflowNetworkAffiliates::class)->id(),
                'trackingDomainId' => $this->id(),
            ]), $data);
        } else {
            return EverflowHttpClient::put(EverflowHttpClient::route('networks/affiliates/:affiliateId/trackingdomains/:trackingDomainId', [
                'affiliateId' => $this->parent(EverflowNetworkAffiliates::class)->id(),
                'trackingDomainId' => $this->id(),
            ]), $data);
        }
    }

    public function delete()
    {
        return EverflowHttpClient::delete(EverflowHttpClient::route('networks/affiliates/:affiliateId/trackingdomains/:trackingDomainId', [
            'affiliateId' => $this->parent(EverflowNetworkAffiliates::class)->id(),
            'trackingDomainId' => $this->id(),
        ]));
    }

    public function patch($data = [], $apply = false)
    {
        if ($apply) {
            EverflowHttpClient::patch(EverflowHttpClient::route('networks/patch/affiliates/apply'), $data);
        } else {
            EverflowHttpClient::post(EverflowHttpClient::route('networks/patch/affiliates/submit'), $data);
        }
    }
}