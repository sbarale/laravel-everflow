<?php

namespace CodeGreenCreative\Everflow;

class EverflowApiBase
{
    // Maps endpoints on this API to other APIs
    public $childApis = [];

    // The ID of current object (if available)
    private $_id = null;

    // Optionally passes an object id to the class
    public function __construct($objectId = null)
    {
        $this->_id = $objectId;
    }

    // Returns the object ID or throws an error
    public function id()
    {
        if (!is_null($this->_id) && $this->_id) {
            return $this->_id;
        } else {
            throw new \Exception('No object ID was supplied for this query');
        }
    }

    public function __call($name, $args)
    {
        // Checks if the function is a child API
        if (array_key_exists($name, $this->childApis)) {
            // If the API exists, uses reflection to create a new instance of it and returns it
            return (new \ReflectionClass($this->childApis[$name]))->newInstanceArgs($args);
        }

        // Fails if nothing is found
        throw new \Exception("No method or child API with name '{$name}' was found");
    }
}