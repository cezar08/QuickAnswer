<?php

namespace Application\Interfaces;


interface AuthServiceInterface
{

    public function dataBaseAuth($data);

    public function facebookAuth($data);

    public function gmailAuth($data);

}