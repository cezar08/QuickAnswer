<?php
/**
 * Created by PhpStorm.
 * User: cezar
 * Date: 13/03/17
 * Time: 21:11
 */

namespace ApplicationTest\Entity;

use PHPUnit\Framework\TestCase;
use Application\Entity\UserEntity as User;

/**
 * Class UserTest
 * @package ApplicationTest\Entity
 * @group Entities
 */

class UserTest extends TestCase
{

    public function testAmountAttributes()
    {
        $arrayCopy = (new User())->getArrayCopy();
        $this->assertEquals(7, count($arrayCopy));

        return $arrayCopy;
    }

    /**
     * @depends testAmountAttributes
     */
    public function testNamesAttributes($arrayCopy)
    {
        $this->assertArrayHasKey('id', $arrayCopy);
        $this->assertArrayHasKey('name', $arrayCopy);
        $this->assertArrayHasKey('email', $arrayCopy);
        $this->assertArrayHasKey('password', $arrayCopy);
        $this->assertArrayHasKey('birthDate', $arrayCopy);
        $this->assertArrayHasKey('typeAuth', $arrayCopy);
        $this->assertArrayHasKey('universitie', $arrayCopy);
    }
}
