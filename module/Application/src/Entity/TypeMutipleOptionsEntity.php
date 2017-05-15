<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class TypeMutipleOptionsEntity
 * @package Application\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="MultipleOptions")
 */
class TypeMutipleOptionsEntity
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
     * @ORM\Column(type="string", length=100, nullable=false)
     *
     * @var string
     */

    protected $Choices;


    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
