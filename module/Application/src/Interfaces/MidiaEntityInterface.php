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
    protected $_id;

    /**
     * @ORM\TypeOfMidia
     * @ORM\Column(type = "integer")
     *
     * @var int
     */
    protected $_typeOfMidia;

    /**
     * @ORM\Column(type="string", length=60, nullable=false)
     *
     * @var string
     */
    protected $_description;

    /**
     * @ORM\Column(type="date", nullable=false)
     *
     * @var date
     */
    protected $_dateMidia;

    /**
     * @ORM\Column(type="string", length=120, nullable=false)
     *
     * @var string
     */
    protected $_path;
}
