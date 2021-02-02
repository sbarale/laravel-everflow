<?php

namespace CodeGreenCreative\Everflow\Api\Experimental;

use Illuminate\Support\Facades\Cache;
use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\Api\EverflowMetadataGeneral as EverflowMetadata;

class EverflowCountries extends EverflowApiBase
{
    private function mapping()
    {
        // Caches the country listing output for later usage
        return Cache::remember('everflow-country-mapping', 30, function () {
            return (new EverflowMetadata)->countries()->countries;
        });
    }

    public function getCountry($countryNameCodeOrId)
    {
        // Fetches country data
        $countries = $this->mapping();

        // Loops through all countries looking for one that matches, returns it if found
        foreach ($countries as $countryInfo) {
            if ($countryNameCodeOrId == $countryInfo->country_id ||
                strtolower($countryNameCodeOrId) == strtolower($countryInfo->country_code) ||
                strtolower($countryNameCodeOrId) == strtolower($countryInfo->country_name)
            ) {
                return $countryInfo;
            }
        }

        // Returns 'null' if no matching country is found
        return null;
    }

    public function get()
    {
        return $this->mapping();
    }
}
