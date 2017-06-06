<?php
/**
 * @author Rafael/Alessandro
 */
namespace ApplicationTest\Service;

use Application\Entity\MediaEntity;
use Application\MediaService;
use PHPUnit\Framework\TestCase;

/**
 * Class MediaServiceTest
 * @package ApplicationTest\Service
 * @group Service
 */
class MediaServiceTest extends AbstractServiceTestCase
{
	/**
     * Test of insertion of a media.
     */
    public function testPersistMedia()
    {
        $serviceMedia = $this->getApplicationServiceLocator()
            ->get('MediaService');

        $path = 'img/media/picture_001.jpeg';
        $type = '1';
        $store_media = $serviceMedia->persistMedia($type, $path);

        $this->assertArrayHasKey('success', $store_media);
    }
}
