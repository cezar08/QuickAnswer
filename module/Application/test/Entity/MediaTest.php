<?php
/**
 * Created by PhpStorm.
 * User: unochapeco
 * Date: 17/04/17
 * Time: 19:30
 */

namespace ApplicationTest\Entity;

use Application\Entity\Entity;
use Application\Entity\MediaEntity;
use Application\Interfaces\MediaEntityInterface;
use PHPUnit\Framework\TestCase;
use Application\Entity\MediaEntity as Media;

/**
 * Class MediaTest
 * @package ApplicationTest\Entity
 * @group Entity
 */
class MediaTest extends TestCase
{
    public function testImplements()
    {
        $media = new MediaEntity();
        $this->assertInstanceOf(MediaEntityInterface::class, $media);
    }

    public function testInherit()
    {
        $media = new MediaEntity();
        $this->assertInstanceOf(
            Entity::class,
            $media
        );
    }

    public function testAmountAttributes()
    {
        $arrayCopy = (new Media())->getArrayCopy();
        $this->assertEquals(5, count($arrayCopy));

        return $arrayCopy;
    }

    /**
     * @depends testAmountAttributes
     */
    public function testNamesAttributes($arrayCopy)
    {
        $this->assertArrayHasKey('id', $arrayCopy);
        $this->assertArrayHasKey('typeOfMedia', $arrayCopy);
        $this->assertArrayHasKey('dateOfMedia', $arrayCopy);
        $this->assertArrayHasKey('path', $arrayCopy);
    }
}
