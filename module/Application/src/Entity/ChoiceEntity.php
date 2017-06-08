<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class TypeMutipleOptionsEntity
 * @package Application\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="Choice")
 */


class ChoiceEntity
{
     /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    protected $id;


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
