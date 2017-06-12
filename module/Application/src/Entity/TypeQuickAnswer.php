<?php
namespace Application\Entity;

use Application\Interfaces\TypeQuestion;

class TypeQuickAnswer implements TypeQuestion
{
    protected $id;

    protected $Answer;

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

}
