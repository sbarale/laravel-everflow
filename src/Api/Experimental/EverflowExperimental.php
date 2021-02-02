<?php

namespace CodeGreenCreative\Everflow\Api\Experimental;

use CodeGreenCreative\Everflow\EverflowApiBase;

class EverflowExperimental extends EverflowApiBase
{
    /**
     * Maps endpoints on this API to other APIs
     */
    public $childApis = [
        'search' => EverflowSearch::class,
        'countries' => EverflowCountries::class,
        'regions' => EverflowRegions::class,
        'cities' => EverflowCities::class,
        'languages' => EverflowLanguages::class,
        'timezones' => EverflowTimezones::class,
        'currencies' => EverflowCurrencies::class,
        'browser_languages' => EverflowBrowserLanguages::class,
    ];
}
