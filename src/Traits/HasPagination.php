<?php

namespace CodeGreenCreative\Everflow\Traits;

use CodeGreenCreative\Everflow\EverflowHttpClient;

trait HasPagination {
    public function page($endpoint, $pageNumber = 1, $pageSize = null)
    {
        // If the page number is not numeric, default to first page
        if (!is_numeric($pageNumber)) {
            $pageNumber = 1;
        }

        // If the page size is not numeric (or is the default 'null'), get the value from config
        if (!is_numeric($pageSize)) {
            $pageSize = config('everflow.per_page');
        }

        return EverflowHttpClient::get($endpoint . "?page={$pageNumber}&page_size={$pageSize}");
    }

    public function pageAll($endpoint, $field)
    {
        // Store all items here
        $all = [];

        // Does a first call to fetch objects
        $response = $this->page($endpoint);

        // Adds response items to the "all" array
        $all = array_merge($all, $response->{$field});

        // Checks if pagination is present
        if (isset($response->paging)) {
            // Calculates how many pages are needed
            $pages = ceil($response->paging->total_count / $response->paging->page_size);

            // Runs through each of the other pages and appends to the array
            for ($page = 2; $page <= $pages; $page++) {
                $all = array_merge($all, $this->page($endpoint, $page, $response->paging->page_size)->{$field});
            }
        }

        // Returns the complete set of results with the proper field
        $results = new \stdClass;
        $results->{$field} = $all;
        return $results;
    }
}