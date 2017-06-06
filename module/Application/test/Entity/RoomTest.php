<?php

/**
 * Created by PhpStorm.
 * User: Jean Carlos da Campo
 * Date: 31/03/17
 */

namespace ApplicationTest\Entity;

use PHPUnit\Framework\TestCase;
use Application\Entity\RoomEntity as Room;

/**
 * Class UserTest
 * @package ApplicationTest\Entity
 * @group Entities
 */

class RoomTest extends TestCase
{
    public function testAmountAttributes()
    {
        $arrayCopy = (new Room())->getArrayCopy();
        $this->assertEquals(6, count($arrayCopy));

        return $arrayCopy;
    }
    /**
     * Class UserTest
     * @package ApplicationTest\Entity
     * @group Entities
     */

    /**
     * @depends testAmountAttributes
     */
    public function testNamesAttributes($arrayCopy)
    {
        $this->assertArrayHasKey('id', $arrayCopy);
        $this->assertArrayHasKey('roomName', $arrayCopy);
        $this->assertArrayHasKey('createDate', $arrayCopy);
        $this->assertArrayHasKey('type', $arrayCopy);
        $this->assertArrayHasKey('user', $arrayCopy);
        $this->assertArrayHasKey('question', $arrayCopy);
    }
}
