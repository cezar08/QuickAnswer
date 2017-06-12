<?php
/**
 * Created by PhpStorm.
 * User: unochapeco
 * Date: 10/04/17
 * Time: 21:09
 */
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Class UniversityEntity
 * @package Application\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="university_qa")
 */
class UniversityEntity extends Entity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type = "integer")
     *
     * @var int
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     *
     * @var string
     */
    private $name;
}