<?php

namespace Application\Entity;

use Application\Interfaces\UserEntityInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class UserEntity
 * @package Application\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="user_qa")
 */
class UserEntity extends Entity implements UserEntityInterface
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type = "integer")
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

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     *
     * @var string
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=64, nullable=false)
     *
     * @var string
     */
    protected $password;

    /**
     * @ORM\Column(type="integer", nullable=false)
     *
     * @var int
     */

    protected $typeAuth;

    /**
     * @ORM\ManyToMany(targetEntity="UniversityEntity")
     * @ORM\JoinTable(name="user_has_university_qa",
     * joinColumns={@ORM\JoinColumn(name="user_id",
     *     referencedColumnName="id")
     * },
     *     inverseJoinColumns={@ORM\JoinColumn(
     *     name="university_id", referencedColumnName="id")
     * }
     * )
     *
     * @var ArrayCollection
     */
    protected $university;

    public function __construct()
    {
        $this->university = new ArrayCollection();
    }
}