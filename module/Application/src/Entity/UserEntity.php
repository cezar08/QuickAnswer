<?php


namespace Application\Entity;

use Application\Interfaces\UserEntityInterface;

class UserEntity extends Entity implements UserEntityInterface
{

    protected $id;

    protected $name;

    protected $email;

    protected $password;

    protected $birthDate;

    protected $typeAuth;

    protected $university;
}
