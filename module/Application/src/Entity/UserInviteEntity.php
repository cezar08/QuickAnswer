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
     * @ORM\Column(type= "integer")
     * @ORM\ManyToOne(targetEntity="UserEntity")
     * @ORM\JoinTable(name="user_qa",
     *     joinColumns={@ORM\JoinColumn(name="id",referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="user", referencedColumnName="id")}
     *)
     *
     * @var int
     */
    protected $username;

    /**
     * @ORM\Column(type= "integer")
     * @ORM\ManyToOne(targetEntity="SalaEntity")
     * @ORM\JoinTable(name="ROOM_qa",
     *     joinColumns={@ORM\JoinColumn(name="id",referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="ROOM", referencedColumnName="id")}
     *)
     *
     * @var int
     */
    protected $room;

    /**
     * @ORM\Column(type= "boolean", nullable=false)
     *
     * @var boolean
     */
    protected $accepted;
}
