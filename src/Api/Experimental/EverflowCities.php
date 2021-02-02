<?php

namespace CodeGreenCreative\Everflow\Api\Experimental;

use Illuminate\Support\Facades\Cache;
use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\Api\EverflowMetadataGeneral as EverflowMetadata;

class EverflowCities extends EverflowApiBase
{
    private function mapping()
    {
        // Caches the city listing output for later usage
        return Cache::remember('everflow-city-mapping', 30, function () {
            return (new EverflowMetadata)->cities()->cities;
        });
    }

    public function getCity($cityCodeOrId)
    {
        // Fetches city data
        $cities = $this->mapping();

        // Loops through all cities looking for one that matches, returns it if found
        foreach ($cities as $cityInfo) {
            if ($cityCodeOrId == $cityInfo->city_id ||
                strtolower($cityCodeOrId) == strtolower($cityInfo->city_code) ||
                strtolower($cityCodeOrId) == strtolower($cityInfo->city_name)
            ) {
                return $cityInfo;
            }
        }

        // Returns 'null' if no matching city is found
        return null;
    }

    public function get()
    {
        return $this->mapping();
    }
}
