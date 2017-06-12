<?php

namespace Application\Entity;

use Application\Interfaces\TypeQuestion;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class TypeMutipleOptionsEntity
 * @package Application\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="MultipleOptions")
 */
class TypeMutipleOptionsEntity implements TypeQuestion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    protected $id;
    /**
     * @ORM\OneToMany(targetEntity="ChoiceEntity", mappedBy="typeMultipleOption")
     *
     * @var string
     */
    protected $choices;

    public function __construct()
    {
        $this->choices = new ArrayCollection();
    }


    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    public function __set($name, $value)
    {
        return $this->$name = $value;
    }
}
