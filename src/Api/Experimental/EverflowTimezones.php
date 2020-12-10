<?php

namespace CodeGreenCreative\Everflow\Api\Experimental;

use Illuminate\Support\Facades\Cache;

class EverflowTimezones extends EverflowApiBase
{
    private function mapping()
    {
        // Caches the timezone file output for later usage
        return Cache::remember('everflow-timezone-mapping', 30, function () {
            return json_decode(file_get_contents(__DIR__ . '/../../timezones.json'), false);
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