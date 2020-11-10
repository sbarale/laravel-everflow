<?php

namespace CodeGreenCreative\Everflow\Api\Experimental;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowSearch extends EverflowApiBase
{
    public function resources($type, $value = '', $query = [])
    {
        return EverflowHttpClient::get(
            EverflowHttpClient::route(':api/search/resources', [
                'api' => $this->id(),
            ], array_merge($query, [
                'search_type' => $type,
                'search_value' => $value,
            ]))
        )->results;
    }
}