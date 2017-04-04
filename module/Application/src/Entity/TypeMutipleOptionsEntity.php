<?php
namespace Application\Entity;

class TypeMutipleOptionsEntity
{
    protected $id;

    protected $Choices;

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

}