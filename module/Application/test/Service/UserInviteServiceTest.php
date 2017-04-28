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
            'user' => 1,
            'room' => 1,
            'accepted' => true,
            'email' => "joao@gmail.com",
            'password' => "aeRtX21"
        ];

        $this->invalidData = [
            'user' => 1,
            'room' => 1,
            'accepted' => false,
            'email' => 'joao',
            'password' => ''
        ];

        $user = new UserEntity();
        $user->email = $this->validData['email'];
        $user->password = password_hash($this->validData['password'], PASSWORD_DEFAULT);
        $user->name = 'João';
        $entityManager = $this->getApplicationServiceLocator()
            ->get('Doctrine\ORM\EntityManager');
        $entityManager->persist($user);
        $entityManager->flush();

        $user_invite = new UserInviteEntity();
        $user_invite->user = $this->validData['user'];
        $user_invite->room = $this->validData['room'];
        $user_invite->accepted = $this->validData['accepted'];
        $entityManager = $this->getApplicationServiceLocator()
            ->get('Doctrine\ORM\EntityManager');
        $entityManager->persist($user_invite);
        $entityManager->flush();
    }

    /**
     * Teste do método verifyInvite no service
     * do UserInvite.
     */
    public function testVerifyInvite()
    {
        $serviceInvite = $this->getApplicationServiceLocator()
            ->get('UserInviteService');

        $user['id'] = 1;

        $return = $serviceInvite->verifyInvite($user);

        $this->assertArrayHasKey('userHasInvite', $return);

        $user['id'] = 0;

        $return = $serviceInvite->verifyInvite($user);

        $this->assertArrayHasKey('userNotHasInvite', $return);
    }
}
