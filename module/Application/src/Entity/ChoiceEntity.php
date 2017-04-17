<?php

namespace Application\Entity;

class ChoiceEntity
{

    protected $DescriptionChoice;
    protected $correct;

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
