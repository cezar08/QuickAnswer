<?php
/**
 * @author Rafael/Alessandro
 */
namespace ApplicationTest\Service;

use Application\Entity\MediaEntity;
use Application\Entity\UserEntity;
use Application\Service\MediaService;
use PHPUnit\Framework\TestCase;

/**
 * Class MediaServiceTest
 * @package ApplicationTest\Service
 * @group Service
 */
class MediaServiceTest extends AbstractServiceTestCase
{
	private $userTest;

	public function setUp()
    {
        parent::setUp();

        $this->userTest = [
            'user' => 1,
            'room' => 1,
            'accepted' => true,
            'email' => "Person_001@unochapeco.edu.br",
            'password' => "uno2017"
        ];

        $user = new UserEntity();
        $user->email = $this->userTest['email'];
        $user->password = $this->userTest['password'];
        $user->name = 'Person_001';
        $user->typeAuth = '1';
        $entityManager = $this->getApplicationServiceLocator()
            ->get('Doctrine\ORM\EntityManager');
        $entityManager->persist($user);
        $entityManager->flush();
    }

	/**
     * Test of insertion of a media.
     */
    public function testPersistMedia()
    {
        $serviceMedia = $this->getApplicationServiceLocator()
            ->get('MediaService');

        $user['id'] = 1;
        $path = 'img/media/picture_001.jpeg';
        $store_media = $serviceMedia->persistMedia($user['id'], $path);

        $this->assertArrayHasKey('success', $store_media);
    }
}
