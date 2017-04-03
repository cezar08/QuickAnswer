<?php

namespace ApplicationTest\Entity;

use PHPUnit\Framework\TestCase;
use Application\Entity\SalaEntity as Sala;

/**
 * Class UserTest
 * @package ApplicationTest\Entity
 * @group Entities
 */

class UserTest extends TestCase
{
    /**
    * Seta quantos atributos serão testados
    */
    public function testAmountAttributes()
    {
        $arrayCopy = (new Sala())->getArrayCopy();
        $this->assertEquals(3, count($arrayCopy));

        return $arrayCopy;
    }

    /**
     * @depends testAmountAttributes
     */
    public function testNamesAttributes($arrayCopy)
    {
        $this->assertArrayHasKey('id', $arrayCopy);
        $this->assertArrayHasKey('tipo', $arrayCopy);
        $this->assertArrayHasKey('usuario', $arrayCopy);
    }
}
