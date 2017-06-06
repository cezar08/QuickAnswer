<?php
/**
 * Created by PhpStorm.
 * User: Jean
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class UserEntity
 * @package Application\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="sale_qa")
 */
class RoomEntity extends Entity
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
    protected $roomName;

    /**
     * @ORM\Column(type="date")
     *
     * @var \DateTime
     */
    protected $createDate;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     *
     * @var string
     */
    protected $type;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     *
     * @var string
     */
    protected $user;

    /**
     * @ORM\Column(type="string", length=250, nullable=false)
     *
     * @var string
     */
    protected $question;
}
