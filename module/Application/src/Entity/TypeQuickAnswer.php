<?php
namespace Application\Entity;

class TypeQuickAnswer
{
    protected $id;

    protected $Answer;

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

}
