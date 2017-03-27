<?php
namespace Application\Entity;

class QuestionEntity
{
    protected $id;

    protected $description;

    protected $TypeQuestion;

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}