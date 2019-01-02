<?php
namespace Bindeveloperz\Alert ;


use ArrayAccess;

class Message implements ArrayAccess
{

    /**
     * The title of the message of boxed selected.
     *
     * @var string
     */
    public $title = 'Alert';

    /**
     * The body of the message.
     *
     * @var string
     */
    public $message;

    /**
     * The message level.
     *
     * @var string
     */
    public $type = 'info';


    /**
     * Whether the message have close button.
     *
     * @var bool
     */
    public $close = false;



    /**
     * Whether the message should auto-hide.
     *
     * @var bool
     */
    public $rounded = false;



    /**
     * Whether the message should auto-hide.
     *
     * @var bool
     */
    public $boxed = false;



    public $autoClose = false;




    /**
     * Create a new message instance.
     *
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
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


    /**
     * Whether the given offset exists.
     *
     * @param  mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->$offset);
    }

    /**
     * Fetch the offset.
     *
     * @param  mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->$offset;
    }

    /**
     * Assign the offset.
     *
     * @param  mixed $offset
     * @param $value
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }

    /**
     * Unset the offset.
     *
     * @param  mixed $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        //
    }



}
