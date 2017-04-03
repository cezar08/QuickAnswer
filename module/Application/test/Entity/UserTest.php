<?php
/**
 * Created by PhpStorm.
 * User: cezar
 * Date: 13/03/17
 * Time: 21:11
 */

namespace ApplicationTest\Entity;

use Application\Entity\Entity;
use Application\Entity\UserEntity;
use Application\Interfaces\UserEntityInterface;
use PHPUnit\Framework\TestCase;
use Application\Entity\UserEntity as User;

/**
 * Class UserTest
 * @package ApplicationTest\Entity
 * @group Entities
 */

class UserTest extends TestCase
{

    public function testImplements()
    {
        $user = new UserEntity();
        $this->assertInstanceOf(UserEntityInterface::class, $user);
    }

    public function testInherit()
    {
        $user = new UserEntity();
        $this->assertInstanceOf(
            Entity::class,
            $user
        );
    }

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
        $this->assertArrayHasKey('university', $arrayCopy);
    }
}
