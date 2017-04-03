<?php

namespace ApplicationTest\Validator;

use PHPUnit\Framework\TestCase;
use Application\Validator\QuestionValidator as QuestionValidator;

class QuestionValidatorTest extends TestCase
{

	protected $dataProvider;
    protected $invalidDataProvider;

    public function setUp(){
        parent::setUp();
        $this->dataProvider = [
            'id' => null,
            'description' => "Descrição",
            'TypeQuestion' => "TypeQuestion"
        ];

        $this->invalidDataProvider = [
            'id' => null,
            'description' => "",
            'TypeQuestion' => ""
        ];
    }

    public function testValidator(){
        $validator = new QuestionValidator();
        $validator->setData($this->dataProvider);
        $this->assertTrue($validator->isValid());
    }

    public function testInvalidValidator(){
        $validator = new QuestionValidator();
        $validator->setData($this->invalidDataProvider);

        $this->assertFalse($validator->isValid());
        $this->assertArrayHasKey('description', $validator->getMessages());
        $this->assertArrayHasKey('isEmpty', $validator->getMessages()['description']);

        // $this->assertArrayHasKey('TypeQuestion', $validator->getMessages());
        // $this->assertArrayHasKey('IsInstanceOf', $validator->getMessages()['TypeQuestion']);
    }


}