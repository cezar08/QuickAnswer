<?php

namespace ApplicationTest\Entity;

use PHPUnit\Framework\TestCase;
use Application\Entity\ChoiceEntity as Choice;

/**
 * Class QuestionTest
 * @package ApplicationTest\Entity
 * @group Entities
 */

class ChoiceTest extends TestCase
{
    public function testAmountAttributes()
    {
        $arrayCopy = (new Choice())->getArrayCopy();
        $this->assertEquals(2, count($arrayCopy));

        return $arrayCopy;
    }
    /**
     * @depends testAmountAttributes
     */
    public function testNamesAttributes($arrayCopy)
    {
        $this->assertArrayHasKey('DescriptionChoice', $arrayCopy);
        $this->assertArrayHasKey('correct', $arrayCopy);
    }

}
