<?php
/**
 * Created by PhpStorm.
 * User: unochapeco
 * Date: 03/04/17
 * Time: 20:24
 */

namespace Application\Entity;


use Application\Interfaces\UserEntityInterface;

class UserInviteEntity extends Entity implements UserEntityInterface
{
    protected $id;

    protected $id_sala;

    protected $id_user;

    protected $flag_invite;

}