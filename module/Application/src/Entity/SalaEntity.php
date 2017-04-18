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
class SalaEntity
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
    protected $nomeSala;

    /**
     * @ORM\Column(type="date")
     *
     * @var \DateTime
     */
    protected $dataCriacao;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     *
     * @var string
     */
    protected $tipo;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     *
     * @var string
     */
    protected $usuario;

    /**
     * @ORM\Column(type="string", length=250, nullable=false)
     *
     * @var string
     */
    protected $perguntas;

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
