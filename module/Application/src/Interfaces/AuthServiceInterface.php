<?php

namespace Application\Interfaces;

/**
 * Interface AuthServiceInterface
 * @package Application\Interfaces
 */

interface AuthServiceInterface
{

    public function dataBaseAuth($data);

    public function facebookAuth($data);

    public function gmailAuth($data);

}