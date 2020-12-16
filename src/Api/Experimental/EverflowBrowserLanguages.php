<?php

namespace CodeGreenCreative\Everflow\Api\Experimental;

use Illuminate\Support\Facades\Cache;
use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\Api\EverflowMetadataGeneral as EverflowMetadata;

class EverflowBrowserLanguages extends EverflowApiBase
{
    private function mapping()
    {
        // Caches the language listing output for later usage
        return Cache::remember('everflow-browserlanguage-mapping', 30, function () {
            return (new EverflowMetadata)->browserlanguages()->browser_languages;
        });
    }

    public function getBrowserLanguage($browserLanguageNameCodeOrId)
    {
        // Fetches languages data
        $browserLanguages = $this->mapping();

        // Loops through all languages looking for one that matches, returns it if found
        foreach ($browserLanguages as $browserLanguageInfo) {
            if (
                $browserLanguageNameCodeOrId == $browserLanguageInfo->browser_language_id ||
                strtolower($browserLanguageNameCodeOrId) == strtolower($browserLanguageInfo->language_code) ||
                strtolower($browserLanguageNameCodeOrId) == strtolower($browserLanguageInfo->language)
            ) {
                return $browserLanguageInfo;
            }
        }

        // Returns 'null' if no matching language is found
        return null;
    }
}