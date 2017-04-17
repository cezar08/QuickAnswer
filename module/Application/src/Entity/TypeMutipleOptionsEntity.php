<?php
namespace Application\Entity;

class TypeMutipleOptionsEntity
{
    protected $id;

    protected $Choices;
    //aqui esta o comentario

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}