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
        $invite = $this->entityManger->getRepository(
            '\Application\Entity\UserInviteEntity'
        )->findOneBy(
            [
                'username' => $user['id']
            ]
        );

        if ($invite->accepted) {
            return ['userHasInvite' => 'Usuario Convidado'];
        } elseif (!$invite->accepted) {
            return ['userNotHasInvite' => 'Usuario Não Convidado'];
        }
    }
}
