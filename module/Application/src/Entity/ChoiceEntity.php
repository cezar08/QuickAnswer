<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

class ChoiceEntity
{

    protected $DescriptionChoice;
    protected $correct;

    /**
     * @ORM\ManyToOne(targetEntity="TypeMultipleOptionsEntity", inversedBy="choices")
     * @JoinColumn(name="type_multiple_option_id", referencedColumnName="id")
     */
    protected $typeMultipleOption;

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
