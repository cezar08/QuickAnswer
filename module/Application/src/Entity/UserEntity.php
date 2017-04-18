<?php
/**
 * Created by PhpStorm.
 * User: cezar
 * Date: 13/03/17
 * Time: 21:46
 */

namespace Application\Entity;

use Application\Interfaces\UserEntityInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class UserEntity
 * @package Application\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="user_qa")
 */
class UserEntity implements UserEntityInterface
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
    protected $picture;

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
     * @ORM\Column(type="date")
     *
     * @var \DateTime
     */
    protected $birthDate;


    //protected $typeAuth;

    protected $universities;

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
