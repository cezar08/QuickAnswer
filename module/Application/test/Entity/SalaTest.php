<?php

/**
 * Created by PhpStorm.
 * User: Wesley
 * Date: 31/03/17
 */

namespace ApplicationTest\Entity;

use PHPUnit\Framework\TestCase;
use Application\Entity\SalaEntity as Sala;

/**
 * Class UserTest
 * @package ApplicationTest\Entity
 * @group Entities
 */

class SalaTest extends TestCase
{
    public function testAmountAttributes()
    {
        $arrayCopy = (new Sala())->getArrayCopy();
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
        $this->assertArrayHasKey('nomeSala', $arrayCopy);
        $this->assertArrayHasKey('dataCriacao', $arrayCopy);
        $this->assertArrayHasKey('tipo', $arrayCopy);
        $this->assertArrayHasKey('usuario', $arrayCopy);
        $this->assertArrayHasKey('perguntas', $arrayCopy);
    }
}
