<?php
namespace Zend\Mvc;

interface SalaInterface
{
    // Método para buscar uma sala
    public function buscaSala();

    // Método para definir se a sala é privada ou pública
    public function definePerfilSala();
}