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
    ];
}