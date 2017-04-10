<?php

namespace Application\Entity;

use Application\Interfaces\UserInviteEntityInterface;

class UserInviteEntity extends Entity implements UserInviteEntityInterface
{
    protected $id;

    protected $id_user;

    protected $id_sala;
}
