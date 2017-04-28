<?php

namespace Application\Entity;

use Application\Interfaces\UserInviteEntityInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class UserInviteEntity
 * @package Application\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="user_invite_qa")
 */
class UserInviteEntity extends Entity implements UserInviteEntityInterface
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
     * @ORM\Id
     * @ORM\Column(type= "integer")
     * @ORM\ManyToOne(targetEntity="UserEntity")
     * @ORM\JoinColumn(name="user", referencedColumnName="id")
     *
     * @var int
     */
    protected $user;

    /**
     * @ORM\Id
     * @ORM\Column(type= "integer")
     * @ORM\ManyToOne(targetEntity="SalaEntity")
     * @ORM\JoinColumn(name="room", referencedColumnName="id")
     *
     * @var int
     */
    protected $room;

    /**
     * @ORM\Boolean
     * @ORM\Column(type= "boolean", nullable=false)
     *
     * @var boolean
     */
    protected $accepted;
}
