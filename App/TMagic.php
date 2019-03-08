<?php

namespace App;

trait TMagic
{
    public $data;

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function __get($key)
    {

        return $this->data[$key];

    }

    public function __isset($key)
    {
       return isset($this->$key);
    }
}