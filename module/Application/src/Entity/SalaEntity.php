<?php
/**
 * Created by PhpStorm.
 * User: Jean
 */

namespace Application\Entity;

class SalaEntity
{
    protected $id;

    protected $nomeSala;

    protected $dataCriacao;
    
    protected $tipo;

    protected $usuario;

    protected $perguntas;

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
