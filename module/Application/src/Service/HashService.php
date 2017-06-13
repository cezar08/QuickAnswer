<?php

namespace Application\Service;

//Ederson da Silva.
//Sistemas de Informação.
//Criando uma função que faça um hash.

namespace Application\Service;


class HashService
{

    public function returnHash()
    {
        return md5(uniqid());
    }
}