<?php

namespace ApplicationTest\Service;

use Application\Entity\UserEntity as User;
use Application\Service\AuthService;
use Zend\Stdlib\ArrayUtils;

/**
 *
 * Class AuthServiceTest
 * @group Service
 */
class AuthServiceTest extends \ApplicationTest\Service\AbstractServiceTestCase
{

    /**
     * @var array
     */
    private $validData;

    /**
     * @var array
     */
    private $invalidData;

    /**
     *
     */
    public function setUp()
    {
        parent::setUp();
        $this->validData = [
            'email' => "joao@gmail.com",
            'password' => "aeRtX21"
        ];
        $this->invalidData = [
            'email' => 'joao',
            'password' => ''
        ];

        $user = new UserEntity();
        $user ->email = $this->validData['email'];
        $user->password = password_hash($this->validData['password'], PASSWORD_DEFAULT);
        $user->name = 'João';
        $entityManager = $this->getApplicationServiceLocator()
            ->get('Doctrine\ORM\EntityManager');
        $entityManager->persist($user);
        $entityManager->flush();
    }

    public function testDataBaseValidateAuth()
    {
        $serviceAuth = $this->getApplicationServiceLocator()
            ->get('AuthService');
        $this->assertArrayHasKey("success", $serviceAuth->dataBaseAuth(
            $this->validData
        ));
        $response = $serviceAuth->dataBaseAuth($this->invalidData);
        $this->assertArrayHasKey("error", $response);
    }

    public function testInvalidLogin()
    {
        $serviceAuth = $this->getApplicationServiceLocator()
            ->get('AuthService');
        $response = $serviceAuth->dataBaseAuth(
            ['email' => 'maria@gmail.com', 'password' => '123345678']
        );
        $this->assertArrayHasKey("error", $response);
        $this->assertEquals('Usuário ou senha inválidos!', $response['error']);
    }

    public function testPassCriptDataBase()
    {
        $entityManager = $this->getApplicationServiceLocator()
            ->get('Doctrine\ORM\EntityManager');
        $users = $entityManager->getRepository(
            '\Application\Entity\UserEntity'
        )->findAll();
        $this->assertEquals(1, count($users));
        $user = $users[0];
        $this->assertEquals(1, $user->id);
        $this->assertEquals("João", $user->name);
        $this->assertNotEquals("aeRtX21", $user->password);
    }
}
