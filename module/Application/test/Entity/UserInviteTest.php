<?php

namespace ApplicationTest\Entity;

use Application\Entity\Entity;
use Application\Entity\UserInviteEntity;
use Application\Interfaces\UserInviteEntityInterface;
use PHPUnit\Framework\TestCase;
use Application\Entity\UserInviteEntity as UserInvite;

/**
 * Class UserTest
 * @package ApplicationTest\Entity
 * @group UserInvite
 */

class UserInviteTest extends TestCase
{
    public function testImplements()
    {
        $user_invite = new UserInviteEntity();
        $this->assertInstanceOf(UserInviteEntityInterface::class, $user_invite);
    }

    public function testInherit()
    {
        $user_invite = new UserInviteEntity();
        $this->assertInstanceOf(
            Entity::class,
            $user_invite
        );
    }

    public function testAmountAttributes()
    {
        $arrayCopy = (new UserInvite())->getArrayCopy();
        $this->assertEquals(3, count($arrayCopy));

        return $arrayCopy;
    }

    /**
     * @depends testAmountAttributes
     *
     * @param $arrayCopy
     */
    public function testNamesAttributes($arrayCopy)
    {
        $this->assertArrayHasKey('id', $arrayCopy);
        $this->assertArrayHasKey('id_user', $arrayCopy);
        $this->assertArrayHasKey('id_sala', $arrayCopy);
    }
}
