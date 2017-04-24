<?php
/**
 * Created by PhpStorm.
 * User: unochapeco
 * Date: 17/04/17
 * Time: 19:30
 */

namespace ApplicationTest\Entity;

use Application\Entity\Entity;
use Application\Entity\MidiaEntity;
use Application\Interfaces\MidiaInterface;
use PHPUnit\Framework\TestCase;
use Application\Entity\MidiaEntity as Midia;
/**
 * Class MidiaTest
 * @package ApplicationTest\Entity
 * @group Entities
 */
class MidiaTest extends TestCase
{
    public function testImplements()
    {
        $midia = new MidiaEntity();
        $this->assertInstanceOf(MidiaEntityInterface::class, $midia);
    }

    public function testInherit()
    {
        $midia = new MidiaEntity();
        $this->assertInstanceOf(
            Entity::class,
            $midia
        );
    }

    public function testAmountAttributes()
    {
        $arrayCopy = (new Midia())->getArrayCopy();
        $this->assertEquals(5, count($arrayCopy));

        return $arrayCopy;
    }

    /**
     * @depends testAmountAttributes
     */
    public function testNamesAttributes($arrayCopy)
    {
        $this->assertArrayHasKey('id', $arrayCopy);
        $this->assertArrayHasKey('typeofmidia', $arrayCopy);
        $this->assertArrayHasKey('description', $arrayCopy);
        $this->assertArrayHasKey('dateMidia', $arrayCopy);
        $this->assertArrayHasKey('path', $arrayCopy);
    }
}