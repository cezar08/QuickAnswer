<?php

namespace ApplicationTest\Entity;

use Application\Entity\Entity;
use Application\Entity\UserInviteEntity;
use PHPUnit\Framework\TestCase;

/**
 * Class UserInviteTest
 * @package ApplicationTest\Entity
 * @group Entities
 */
class UserInviteTest extends TestCase
{

    /**
     * Tesde que verifica se é instanciado uma
     * classe do mesmo tipo.
     */
    public function testImplements()
    {
        $userInvite = new UserInviteEntity();
        $this->assertInstanceOf(UserInviteEntity::class, $userInvite);
    }

    /**
     * Teste de herança entre classes.
     */
    public function testInherit()
    {
        $userInvite = new UserInviteEntity();
        $this->assertInstanceOf(
            Entity::class,
            $userInvite
        );
    }

    /**
     * Método que testa a quantidade de atributos
     * da classe UserInviteEntity.
     *
     * @return array
     */
    public function testAmountAttributes()
    {
        $arrayCopy = (new UserInviteEntity())->getArrayCopy();
        $this->assertEquals(4, count($arrayCopy));

        return $arrayCopy;
    }

    /**
     * Método que testa o nome dos atributos
     * da classe.
     *
     * @depends testAmountAttributes
     * @param $arrayCopy
     */
    public function testNamesAttributes($arrayCopy)
    {
        $this->assertArrayHasKey('id', $arrayCopy);
        $this->assertArrayHasKey('id_sala', $arrayCopy);
        $this->assertArrayHasKey('id_user', $arrayCopy);
        $this->assertArrayHasKey('flag_invite', $arrayCopy);
    }
}
