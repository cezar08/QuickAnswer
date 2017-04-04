<?php

namespace ApplicationTest\Entity;

use PHPUnit\Framework\TestCase;
use Application\Entity\TypeMutipleOptionsEntity as TypeMultipleOptions;

class TypeMultipleOptionsTest extends TestCase
{

    public function testAmountAttributes()
    {
        $arrayCopy = (new TypeMultipleOptions())->getArrayCopy();
        $this->assertEquals(2, count($arrayCopy));

        return $arrayCopy;
    }

    /**
     * @depends testAmountAttributes
     */
    public function testNamesAttributes($arrayCopy)
    {
        $this->assertArrayHasKey('id', $arrayCopy);
        $this->assertArrayHasKey('Choices', $arrayCopy);
    }
}