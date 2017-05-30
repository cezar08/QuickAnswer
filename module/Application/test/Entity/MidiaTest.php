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
use Application\Interfaces\MidiaEntityInterface;
use PHPUnit\Framework\TestCase;
use Application\Entity\MidiaEntity as Midia;

/**
 * Class MidiaTest
 * @package ApplicationTest\Entity
 * @group Entity
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
        $this->assertArrayHasKey('_id', $arrayCopy);
        $this->assertArrayHasKey('_typeOfMidia', $arrayCopy);
        $this->assertArrayHasKey('_description', $arrayCopy);
        $this->assertArrayHasKey('_dateMidia', $arrayCopy);
        $this->assertArrayHasKey('_path', $arrayCopy);
    }
}
