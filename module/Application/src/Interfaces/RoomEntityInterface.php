<?php
namespace Application\Interfaces;

interface RoomEntityInterface
{
    // Método para buscar uma sala
    public function searchRoom();

    // Método para definir se a sala é privada ou pública
    public function defineProfileRoom();
}
