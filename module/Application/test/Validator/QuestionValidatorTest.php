<?php

namespace ApplicationTest\Validator;

use PHPUnit\Framework\TestCase;
use Application\Validator\QuestionValidator as QuestionValidator;
use Zend\Mvc\Application;

class QuestionValidatorTest extends TestCase
{

	protected $dataProvider;
    protected $invalidDataProvider;
    private $typeQuestion;

    public function setUp(){
        parent::setUp();

        $this->typeQuestion = $this->getMockBuilder('Application\Entity\TypeQuestion')->getMock();

        $this->dataProvider = [
            'id' => null,
            'description' => "Descrição",
            'TypeQuestion' => $this->typeQuestion
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
//        $this->assertTrue($this->dataProvider['typeQuestion'] instanceof TypeQuestion);
    }

    public function testInvalidValidator(){
        $validator = new QuestionValidator();
        $validator->setData($this->invalidDataProvider);

        $this->assertFalse($validator->isValid());
        $this->assertArrayHasKey('description', $validator->getMessages());
        $this->assertArrayHasKey('isEmpty', $validator->getMessages()['description']);

//         $this->assertArrayHasKey('TypeQuestion', $validator->getMessages());
        // $this->assertArrayHasKey('IsInstanceOf', $validator->getMessages()['TypeQuestion']);



    }


}