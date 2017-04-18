<?php
namespace Application\Entity;

abstract class Entity
{
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    public function __get($name)
    {
        return $this->$name;
    }
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}