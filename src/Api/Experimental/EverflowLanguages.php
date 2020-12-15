<?php

namespace CodeGreenCreative\Everflow\Api\Experimental;

use Illuminate\Support\Facades\Cache;
use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\Api\EverflowMetadataGeneral as EverflowMetadata;

class EverflowLanguages extends EverflowApiBase
{
    private function mapping()
    {
        // Caches the language listing output for later usage
        return Cache::remember('everflow-language-mapping', 30, function () {
            return (new EverflowMetadata)->browserlanguages()->browser_languages;
        });
    }

    public function getLanguage($languageNameCodeOrId)
    {
        // Fetches languages data
        $languages = $this->mapping();

        // Loops through all languages looking for one that matches, returns it if found
        foreach ($languages as $languageInfo) {
            if (
                $languageNameCodeOrId == $languageInfo->browser_language_id ||
                strtolower($languageNameCodeOrId) == strtolower($languageInfo->language_code) ||
                strtolower($languageNameCodeOrId) == strtolower($languageInfo->language)
            ) {
                return $languageInfo;
            }
        }

        // Returns 'null' if no matching language is found
        return null;
    }
}