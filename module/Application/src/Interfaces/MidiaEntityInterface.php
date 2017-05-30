<?php
namespace Application\Entity;

use Application\Interfaces\MidiaEntityInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class MidiaEntity
 * @package Application\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="midia_qa")
 */
class MidiaEntity extends Entity implements MidiaEntityInterface
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
     * @ORM\TypeOfMidia
     * @ORM\Column(type = "integer")
     *
     * @var int
     */
    protected $typeOfMidia;

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
    protected $dateMidia;

    /**
     * @ORM\Column(type="string", length=120, nullable=false)
     *
     * @var string
     */
    protected $path;
}
