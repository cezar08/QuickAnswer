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
     * @ManyToOne(targetEntity="UserEntity")
     * @JoinColumn(name="id_user", referencedColumnName="id")
     *
     * @var int
     */
    protected $user;

    /**
     * @ORM\Id
     * @ORM\Column(type= "integer")
     * @ManyToOne(targetEntity="SalaEntity")
     * @JoinColumn(name="id_room", referencedColumnName="id")
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
