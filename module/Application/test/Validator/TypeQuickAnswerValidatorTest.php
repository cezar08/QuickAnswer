<?php

namespace ApplicationTest\Validator;

use Application\Interfaces\TypeMultipleOptionsInterface;
use Application\Validator\TypeQuickAnswerValidator;
use PHPUnit\Framework\TestCase;
use Application\Validator\TypeMutipleOptionsValidator as TypeMutipleOptionsValidator;

class TypeQuickAnswerValidatorTest extends TestCase
{
    protected $dataProvider;
    protected $invalidDataProvider;
    private $answer;

    public function setUp()
    {

        $this->answer = $this->getMockBuilder('Application\Interfaces\TypeQuickAnswerInterface')->getMock();

        $this->dataProvider = [
            'id' => null,
            'Answer' => $this->answer,

        ];

        $this->invalidDataProvider = [
            'id' => null,
            'Answer' => new \DateTime(),

        ];
    }

    public function testValidator()
    {
        $validator = new TypeQuickAnswerValidator();
        $validator->setData($this->dataProvider);
        $this->assertInstanceOf(
            'Application\Interfaces\TypeQuickAnswerInterface',
            $this->dataProvider['Answer']
        );
    }

    public function testInvalidValidator()
    {
        $validator = new TypeQuickAnswerValidator();
        $validator->setData($this->invalidDataProvider);

        $this->assertFalse($validator->isValid());
        $this->assertArrayHasKey('Answer', $validator->getMessages());


        $this->invalidDataProvider['Answer'] = null;
        $validator->setData($this->invalidDataProvider);

        $this->assertFalse($validator->isValid());
        $this->assertArrayHasKey('isEmpty', $validator->getMessages()['Answer']);
    }
}
