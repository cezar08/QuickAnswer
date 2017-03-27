<?php
/**
 * Created by PhpStorm.
 * User: cezar
 * Date: 13/03/17
 * Time: 21:46
 */

namespace Application\Entity;

class UserEntity
{

    protected $id;

    protected $name;

    protected $picture;

    protected $email;

    protected $password;

    protected $birthDate;

    protected $typeAuth;

    protected $universities;

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}