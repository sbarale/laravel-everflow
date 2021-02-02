<?php

namespace CodeGreenCreative\Everflow\Api\Experimental;

use Illuminate\Support\Facades\Cache;
use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\Api\EverflowMetadataGeneral as EverflowMetadata;

class EverflowRegions extends EverflowApiBase
{
    private function mapping()
    {
        // Caches the region listing output for later usage
        return Cache::remember('everflow-region-mapping', 30, function () {
            return (new EverflowMetadata)->regions()->regions;
        });
    }

    public function getRegion($regionCodeOrId)
    {
        // Fetches region data
        $regions = $this->mapping();

        // Loops through all regions looking for one that matches, returns it if found
        foreach ($regions as $regionInfo) {
            if ($regionCodeOrId == $regionInfo->region_id ||
                strtolower($regionCodeOrId) == strtolower($regionInfo->region_code) ||
                strtolower($regionCodeOrId) == strtolower($regionInfo->region_name)
            ) {
                return $regionInfo;
            }
        }

        // Returns 'null' if no matching region is found
        return null;
    }

    public function get()
    {
        return $this->mapping();
    }
}
