<?php


class Test implements ArrayAccess
{

    public $someProp = [];

    public function offsetExists($offset)
    {
        return property_exists($this, $offset);
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
        unset($this->$offset);
    }
}

$a = new Test();

$a[] = 'HEY';
$a[] = 'DUH';

$a['someProp'] = ['HEYA', 'DUHA'];
$a['someProp'] = array_merge($a['someProp'], ['UFF']);

var_dump($a);
