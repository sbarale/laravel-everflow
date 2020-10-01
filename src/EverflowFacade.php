<?php

namespace CodeGreenCreative\Everflow;

use Illuminate\Support\Facades\Facade;

class EverflowFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'everflow'; }
}