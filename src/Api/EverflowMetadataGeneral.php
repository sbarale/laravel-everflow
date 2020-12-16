<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowMetadataGeneral extends EverflowApiBase
{
    /**
     * Maps endpoints on this API to other APIs
     */
    public $childApis = [
        'languages' => EverflowMetadataGeneralLanguages::class,
    ];

    public function timezones()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('meta/timezones'));
    }

    public function countries()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('meta/countries'));
    }

    public function regions()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('meta/regions'));
    }

    public function cities()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('meta/cities'));
    }

    public function dmas()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('meta/dmas'));
    }

    public function mobilecarriers()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('meta/mobilecarriers'));
    }

    public function browsers()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('meta/browsers'));
    }

    public function platforms()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('meta/platforms'));
    }

    public function osversions()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('meta/osversions'));
    }

    public function devices()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('meta/devices'));
    }

    public function connectiontypes()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('meta/connectiontypes'));
    }

    public function currencies()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('meta/currencies'));
    }

    public function browserlanguages()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('meta/browserlanguages'));
    }
}