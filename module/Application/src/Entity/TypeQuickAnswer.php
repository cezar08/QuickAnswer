<?php
namespace Application\Entity;

class TypeQuickAnswer
{
    protected $id;

    protected $answer;

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

}
