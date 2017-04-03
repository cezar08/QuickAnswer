<?php
/**
 * Created by PhpStorm.
 * User: cezar
 * Date: 13/03/17
 * Time: 21:46
 */

namespace Application\Entity;

use Application\Interfaces\UserEntityInterface;

class UserEntity implements UserEntityInterface
{

    protected $id;

    protected $name;

    protected $email;

    protected $password;

    protected $birthDate;

    protected $typeAuth;

    protected $universitie;

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
