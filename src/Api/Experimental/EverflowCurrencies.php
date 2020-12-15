<?php

namespace CodeGreenCreative\Everflow\Api\Experimental;

use Illuminate\Support\Facades\Cache;
use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\Api\EverflowMetadataGeneral as EverflowMetadata;

class EverflowCurrencies extends EverflowApiBase
{
    private function mapping()
    {
        // Caches the currency listing output for later usage
        return Cache::remember('everflow-currency-mapping', 30, function () {
            return (new EverflowMetadata)->currencies()->currencies;
        });
    }

    public function getCurrency($currencyNameOrId)
    {
        // Fetches all TZs from the currencies file
        $currencies = $this->mapping();

        // Loops through all currencies looking for one that matches, returns it if found
        foreach ($currencies as $currencyInfo) {
            if (
                $currencyNameOrId == $currencyInfo->currency_id ||
                strtolower($currencyNameOrId) == strtolower($currencyInfo->name)
            ) {
                return $currencyInfo;
            }
        }

        // Returns 'null' if no matching currency is found
        return null;
    }
}