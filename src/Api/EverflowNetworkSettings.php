<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkSettings extends EverflowApiBase
{
    public function affiliatePortal()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/settings/affiliateportal'));
    }

    public function customFields($withSlugs = true)
    {
        // Gets all the fields
        $fields = collect($this->affiliatePortal()->relationship->custom_fields);

        // Optionally slugifies them
        if ($withSlugs) {
            $fields = $fields->map(function ($field) {
                $field->laravel_everflow_slug = \Str::slug($field->label, '_');
                return $field;
            })->keyBy('laravel_everflow_slug');
        }

        // Returns the fields
        return $fields->all();
    }

    /**
     * Get Network settings address
     *
     * @return
     */
    public function address()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/settings/address'));
    }
}
