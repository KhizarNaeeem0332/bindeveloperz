<?php

namespace Bindeveloperz\Toast;


use ArrayAccess;

class Message implements ArrayAccess
{

    public $title = '';
    public $message = '';
    public $type = 'info';
    public $persist = false;
    public $close = false;
    public $progress = false;
    public $position = '';



    public function __construct($attributes = [])
    {
        $this->position = config('toast.defaultPosition' , 'toast-top-right');
        $this->update($attributes);
    }


    /**
     * Update the attributes.
     *
     * @param  array $attributes
     * @return $this
     */
    public function update($attributes = [])
    {
        $attributes = array_filter($attributes);

        foreach ($attributes as $key => $attribute) {
            $this->$key = $attribute;
        }

        return $this;
    }




    public function offsetExists($offset)
    {
        return isset($this->$offset);
    }


    public function offsetGet($offset)
    {
        return $this->$offset;
    }


    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }
}