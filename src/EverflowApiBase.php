<?php

namespace CodeGreenCreative\Everflow;

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
}