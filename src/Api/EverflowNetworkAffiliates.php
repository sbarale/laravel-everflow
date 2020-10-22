<?php

namespace CodeGreenCreative\Everflow\Api;

use CodeGreenCreative\Everflow\EverflowApiBase;
use CodeGreenCreative\Everflow\EverflowHttpClient;

class EverflowNetworkAffiliates extends EverflowApiBase
{
    /**
     * Maps endpoints on this API to other APIs
     */
    public $childApis = [
        'users' => EverflowNetworkAffiliatesUsers::class,
        'apikeys' => EverflowNetworkAffiliatesKeys::class,
        'domains' => EverflowNetworkAffiliatesDomains::class,
    ];

    public function all()
    {
        // Store all items here
        $all = [];

        // Does a first call to fetch objects
        $response = $this->page();

        // Adds response items to the "all" array
        $all = array_merge($all, $response->affiliates);

        // Checks if pagination is present
        if (isset($response->paging)) {
            // Calculates how many pages are needed
            $pages = ceil($response->paging->total_count / $response->paging->page_size);

            // Runs through each of the other pages and appends to the array
            for ($page = 2; $page <= $pages; $page++) {
                $all = array_merge($all, $this->page($page, $response->paging->page_size)->affiliates);
            }
        }

        // Returns the complete set of results
        return $all;
    }

    public function page($pageNumber = 1, $pageSize = 500)
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/affiliates') . "?page={$pageNumber}&page_size={$pageSize}");
    }

    public function get()
    {
        return EverflowHttpClient::get(EverflowHttpClient::route('networks/affiliates/:affiliateId', [
            'affiliateId' => $this->id(),
        ]));
    }

    public function create($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/affiliates'), $data);
    }

    public function signup($data = [])
    {
        return EverflowHttpClient::post(EverflowHttpClient::route('networks/affiliate/signup'), $data);
    }

    public function update($data = [])
    {
        return EverflowHttpClient::put(EverflowHttpClient::route('networks/affiliates/:affiliateId', [
            'affiliateId' => $this->id(),
        ]), $data);
    }

    public function notifications($pageSize = 5)
    {
        // Fetch the Affiliate's users
        $users = $this->asAdmin()->users()->all()->users;

        // If no users are found, return an error
        if (empty($users)) {
            throw new \Exception('The provided Affiliate has no users');
        }

        // Gets the first user and passes it to the notifications API call
        $user = $users[0];
        
        return $this->asAffiliate($this->id(), $user->network_affiliate_user_id)->users($user->network_affiliate_user_id)->notifications($pageSize);
    }
}