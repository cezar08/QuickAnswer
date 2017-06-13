<?php

namespace ApplicationTest\Service;

use Application\Entity\UserEntity;
use Application\Entity\UserInviteEntity;
use Application\Service\UserInviteService;
use PHPUnit\Framework\TestCase;

/**
 * Class UserTest
 * @package ApplicationTest\Entity
 * @group UserInviteService
 */

class UserInviteServiceTest extends AbstractServiceTestCase
{
    private $validData;

    private $invalidData;

    public function setUp()
    {
        parent::setUp();

        $this->validData = [
            'username' => 1,
            'room' => 1,
            'accepted' => true
        ];

        $this->invalidData = [
            'username' => 1,
            'room' => 1,
            'accepted' => false
        ];
    }

    /**
     * Teste do método verifyInvite no service
     * do UserInvite.
     */
    public function testVerifyInvite()
    {
        $serviceInvite = $this->getApplicationServiceLocator()
            ->get('UserInviteService');
        $user_invite = new UserInviteEntity();
        $user_invite->id = 1;
        $user_invite->username = $this->validData['username'];
        $user_invite->room = $this->validData['room'];
        $user_invite->accepted = $this->validData['accepted'];

        $entityManager = $this->getApplicationServiceLocator()->get('Doctrine\ORM\EntityManager');
        $entityManager->persist($user_invite);
        $entityManager->flush();

        $user['id'] = 1;

        $return = $serviceInvite->verifyInvite($user);

        $this->assertArrayHasKey('userHasInvite', $return);
    }

    /**
     * Teste que verifica um usuário não convidado
     */
    public function testInvalidInvite()
    {
        $serviceInvite = $this->getApplicationServiceLocator()
            ->get('UserInviteService');
        $user_invite = new UserInviteEntity();
        $user_invite->username = $this->invalidData['username'];
        $user_invite->room = $this->invalidData['room'];
        $user_invite->accepted = false;
        $entityManager = $this->getApplicationServiceLocator()->get('Doctrine\ORM\EntityManager');
        $entityManager->persist($user_invite);
        $entityManager->flush();

        $user['id'] = 1;

        $return = $serviceInvite->verifyInvite($user);

        $this->assertArrayHasKey('userNotHasInvite', $return);
    }
}
