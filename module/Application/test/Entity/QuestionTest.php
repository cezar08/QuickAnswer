<?php

namespace ApplicationTest\Entity;

use PHPUnit\Framework\TestCase;
use Application\Entity\QuestionEntity as Question;

/**
 * Class QuestionTest
 * @package ApplicationTest\Entity
 * @group Entities
 */

class QuestionTest extends TestCase
{

    public function testAmountAttributes()
    {
        $arrayCopy = (new Question())->getArrayCopy();
        $this->assertEquals(3, count($arrayCopy));

        return $arrayCopy;
    }

    /**
     * @depends testAmountAttributes
     */
    public function testNamesAttributes($arrayCopy)
    {
        $this->assertArrayHasKey('id', $arrayCopy);
        $this->assertArrayHasKey('description', $arrayCopy);
        $this->assertArrayHasKey('TypeQuestion', $arrayCopy);
    }
}
