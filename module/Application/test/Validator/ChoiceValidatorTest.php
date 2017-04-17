<?php

namespace ApplicationTest\Validator;

use PHPUnit\Framework\TestCase;
use Application\Validator\ChoiceValidator as ChoiceValidator;
use Zend\Mvc\Application;

class ChoiceValidatorTest extends TestCase
{

    protected $dataProvider;
    protected $invalidDataProvider;

    public function setUp(){

        parent::setUp();

        $this->dataProvider = [

            'DescriptionChoice' => "Descrição",
            'correct' => "1"
        ];

        $this->invalidDataProvider = [

            'DescriptionChoice' => "",
            'correct' => ""
        ];
    }

    public function testValidator(){
        $validator = new ChoiceValidator();
        $validator->setData($this->dataProvider);
//        $this->assertTrue($this->dataProvider['typeQuestion'] instanceof TypeQuestion);
    }

    public function testInvalidValidator(){
        $validator = new ChoiceValidator();
        $validator->setData($this->invalidDataProvider);

        $this->assertFalse($validator->isValid());
        $this->assertArrayHasKey('DescriptionChoice', $validator->getMessages());
        $this->assertArrayHasKey('isEmpty', $validator->getMessages()['DescriptionChoice']);

    }


}