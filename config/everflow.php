<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Everflow configuration file
    |--------------------------------------------------------------------------
    |
    | Use this file to configure the service providers you want to use.
    |
    */

    // Outputs data to your laravel.log file for debugging
    'debug' => false,

    // Define the Everflow API key being used
    'api_key' => env('EVERFLOW_API_KEY'),
];