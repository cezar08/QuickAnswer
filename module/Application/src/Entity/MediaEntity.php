<?php

namespace Application\Entity;

use Application\Interfaces\MediaEntityInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class MediaEntity
 * @package Application\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="media_qa")
 */
class MediaEntity extends Entity implements MediaEntityInterface
{
	/**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type = "integer",name="id_of_media")
     *
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type = "integer")
     *
     * @var int
     */
    protected $typeOfMedia;

    /**
     * @ORM\Column(type="string", length=60, nullable=false)
     *
     * @var string
     */
    protected $description;

    /**
     * @ORM\Column(type="date", nullable=false)
     *
     * @var date
     */
    protected $dateOfMedia;

    /**
     * @ORM\Column(type="string", length=120, nullable=false)
     *
     * @var string
     */
    protected $path;

    /**
     * @ORM\ManyToOne(targetEntity="UserEntity",
     * inversedBy="MediaEntity", cascade={"persist"})
     * @ORM\JoinColumn(name="Id",
     * referencedColumnName="id_of_media", nullable=False)
     *
     * @var object
     */
    protected $userOfMedia;
}
