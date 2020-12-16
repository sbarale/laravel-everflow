<?php

namespace CodeGreenCreative\Everflow\Api\Experimental;

use Illuminate\Support\Facades\Cache;
use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\Api\EverflowMetadataGeneral as EverflowMetadata;
use CodeGreenCreative\Everflow\Api\EverflowMetadataTranslations as EverflowMetadataLanguages;

class EverflowLanguages extends EverflowApiBase
{
    public function getLanguageInfo($languageNameCodeOrId)
    {
        try {
            // Tries to fetch the language directly from backend
            return (new EverflowMetadataLanguages(null, $languageNameCodeOrId))->getLanguageInfo();
        } catch (\Exception $e) {
            // Returns 'null' if no matching language is found
            return null;
        }
    }

    public function getLanguageTranslations($languageNameCodeOrId)
    {
        try {
            // Tries to fetch the translation directly from backend
            return (new EverflowMetadataLanguages(null, $languageNameCodeOrId))->getPortalTranslations();
        } catch (\Exception $e) {
            // Returns 'null' if no matching language is found
            return null;
        }
    }
}