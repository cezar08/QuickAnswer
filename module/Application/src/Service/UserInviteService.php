<?php

namespace Application\Service;

use Application\Validator\UserValidator;
use Doctrine\ORM\EntityManager;
use Application\Validator\UserInviteValidator;

class UserInviteService
{
    protected $entityManger;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManger = $entityManager;
    }

    public function verifyInvite($user)
    {
        if ($user['id'] != null) {
            $invite = $this->entityManger->getRepository(
                '\Application\Entity\UserInviteEntity'
            )->findOneBy(
                [
                    'user' => $user['id']
                ]
            );
        }

        if ($invite) {
            return ['userHasInvite' => 'Usuario Convidado'];
        } else {
            return ['userNotHasInvite' => 'Usuario Não Convidado'];
        }
    }
}
