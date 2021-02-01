<?php

namespace CodeGreenCreative\Everflow;

use Illuminate\Support\Facades\Cache;

class EverflowApiBase
{
    // Maps endpoints on this API to other APIs
    public $childApis = [];

    // The parent API
    private $parent = null;

    // The ID of current object (if available)
    private $id = null;

    // Optionally passes an object id to the class and the parent API
    public function __construct($parent = null, $objectId = null)
    {
        $this->parent = $parent;
        $this->id = $objectId;
    }

    // Returns the object ID or throws an error
    public function id()
    {
        if (!is_null($this->id) && $this->id) {
            return $this->id;
        } else {
            throw new \Exception('No object ID was supplied for this query');
        }
    }

    // Returns the parent object of a certain type
    public function parent($type = null)
    {
        // If the current parent is null, stop here and do no more processing
        if (is_null($this->parent)) {
            return null;
        }

        // If no type is passed, return this parent
        if (is_null($type)) {
            return $this->parent;
        }

        // Tries to compare the parent's type, if matches return it
        if (is_a($this->parent(), $type)) {
            return $this->parent();
        }

        // If no match yet, recurses
        return $this->parent()->parent($type);
    }

    public function __call($name, $args)
    {
        // Checks if the function is a child API
        if (array_key_exists($name, $this->childApis)) {
            // If the API exists, uses reflection to create a new instance of it and returns it
            return (new \ReflectionClass($this->childApis[$name]))
                ->newInstanceArgs(array_merge([$this], $args));
        }

        // Fails if nothing is found
        throw new \Exception("No method or child API with name '{$name}' was found");
    }

    public function cached($type, $id, $callback)
    {
        return Cache::remember("everflow-{$type}-{$id}", 30, $callback);
    }

    public function as($apiKey)
    {
        // Tells the API client to auth next request with the passed API key
        EverflowHttpClient::authNextRequestAs($apiKey);

        // Allows for function chaining
        return $this;
    }

    public function asAdmin()
    {
        // Allows for function chaining
        return $this->as(config('everflow.api_key'));
    }

    public function asAffiliate($affiliate)
    {
        // Gets the Affiliate's API keys
        $affiliateKeys = $this->cached('affiliate', $affiliate, function () use ($affiliate) {
            return (new Everflow)->asAdmin()->network()->affiliates($affiliate)->apikeys()->all();
        });

        // If no user is present, returns error
        if (empty($affiliateKeys->keys)) {
            throw new \Exception("Specified Affiliate does not have any API keys, please check if your Affiliate has valid Users and Keys");
        }

        // Gets the first of the active keys
        $affiliateKey = collect($affiliateKeys->keys)->filter(function ($key) {
            return ('active' == $key->key_status);
        })->first();

        // If no active key is set, returns error
        if (is_null($affiliateKey)) {
            throw new \Exception("Specified Affiliate does have API keys but none are active, please check if your Affiliate has valid Users and Keys");
        }

        // Allows for function chaining
        return $this->as($affiliateKey->api_key);
    }
}
