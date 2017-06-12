<?php

namespace ApplicationTest\Service;

use Application\MediaService;

/**
 * Class MediaServiceTest
 * @package ApplicationTest\Service
 * @group Service
 */
class MediaServiceTest extends \ApplicationTest\Service\AbstractServiceTestCase
{
    /**
     * Test of insertion of a media.
     */
    public function testPersistMedia()
    {
        $serviceMedia = $this->getApplicationServiceLocator()
            ->get('MediaService');

        $path = 'img/media_repository/picture_001.jpeg';
        $type = 'image';
        $store_media = $serviceMedia->persistMedia($type, $path);

        $this->assertArrayHasKey('success', $store_media);
    }
}
