<?php

namespace ApplicationTest\Validator;

use Application\Interfaces\TypeQuestionInterface;
use PHPUnit\Framework\TestCase;
use Application\Validator\QuestionValidator as QuestionValidator;

class QuestionValidatorTest extends TestCase
{
    protected $dataProvider;
    protected $invalidDataProvider;
    private $typeQuestion;

    public function setUp()
    {

        $this->typeQuestion = $this->getMockBuilder('Application\Interfaces\TypeQuestionInterface')->getMock();

        $this->dataProvider = [
            'id' => null,
            'description' => "Descrição",
            'TypeQuestion' => $this->typeQuestion
        ];

        $this->invalidDataProvider = [
            'id' => null,
            'description' => "",
            'TypeQuestion' => new \DateTime()
        ];
    }

    public function testValidator()
    {
        $validator = new QuestionValidator();
        $validator->setData($this->dataProvider);
        $this->assertInstanceOf(TypeQuestionInterface::class, $this->dataProvider['TypeQuestion']);
    }

    public function testInvalidValidator()
    {
        $validator = new QuestionValidator();
        $validator->setData($this->invalidDataProvider);

        $this->assertFalse($validator->isValid());
        $this->assertArrayHasKey('description', $validator->getMessages());
        $this->assertArrayHasKey('isEmpty', $validator->getMessages()['description']);
        $this->assertArrayHasKey('TypeQuestion', $validator->getMessages());
        $this->assertArrayHasKey('notInstanceOf', $validator->getMessages()['TypeQuestion']);

        $this->invalidDataProvider['TypeQuestion'] = null;
        $validator->setData($this->invalidDataProvider);

        $this->assertFalse($validator->isValid());
        $this->assertArrayHasKey('isEmpty', $validator->getMessages()['TypeQuestion']);
    }
}
