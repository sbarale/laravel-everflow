<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;

class EverflowMetadataGeneral extends EverflowApiBase
{
    public function timezones()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/meta/timezones'));
    }

    public function countries()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/meta/countries'));
    }

    public function regions()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/meta/regions'));
    }

    public function cities()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/meta/cities'));
    }

    public function dmas()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/meta/dmas'));
    }

    public function mobilecarriers()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/meta/mobilecarriers'));
    }

    public function browsers()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/meta/browsers'));
    }

    public function platforms()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/meta/platforms'));
    }

    public function osversions()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/meta/osversions'));
    }

    public function devices()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/meta/devices'));
    }

    public function connectiontypes()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/meta/connectiontypes'));
    }

    public function currencies()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/meta/currencies'));
    }
}