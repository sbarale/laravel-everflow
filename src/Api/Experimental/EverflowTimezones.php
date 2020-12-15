<?php

namespace CodeGreenCreative\Everflow\Api\Experimental;

use Illuminate\Support\Facades\Cache;
use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\Api\EverflowMetadataGeneral as EverflowMetadata;

class EverflowTimezones extends EverflowApiBase
{
    private function mapping()
    {
        // Caches the timezone listing output for later usage
        return Cache::remember('everflow-timezone-mapping', 30, function () {
            return (new EverflowMetadata)->timezones()->timezones;
        });
    }

    public function getTimezone($timezoneNameOrId)
    {
        // Fetches all TZs from the timezones file
        $timezones = $this->mapping();

        // Loops through all timezones looking for one that matches, returns it if found
        foreach ($timezones as $timezoneInfo) {
            if (
                $timezoneNameOrId == $timezoneInfo->timezone_id ||
                strtolower($timezoneNameOrId) == strtolower($timezoneInfo->timezone)
            ) {
                return $timezoneInfo;
            }
        }

        // Returns 'null' if no matching timezone is found
        return null;
    }
}