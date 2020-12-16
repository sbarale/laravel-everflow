<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowMetadataTranslations extends EverflowApiBase
{
    private function all()
    {
        // TODO:FIXME: This endpoint DOES NOT WORK. Must figure out why, as this works on the sample client (under My Account -> Edit)
        return EverflowHttpClient::get(EverflowHttpClient::route('i18n/languages/:id'));
    }

    public function getLanguageInfo()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('i18n/languages/:id', [
            'id' => $this->id(),
        ]));
    }

    public function getPortalTranslations()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('i18n/portal/affiliate/translations/:id', [
            'id' => $this->id(),
        ]));
    }
}