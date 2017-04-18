<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class UniversityEntity
 * @package Application\Entity
*
 * @ORM\Entity
 * @ORM\Table(name="university_qa")
 */
class University extends Entity
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
    protected $name;

}