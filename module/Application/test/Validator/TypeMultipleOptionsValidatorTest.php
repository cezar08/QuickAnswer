<?php

namespace ApplicationTest\Validator;

use Application\Interfaces\TypeMultipleOptionsInterface;
use PHPUnit\Framework\TestCase;
use Application\Validator\TypeMutipleOptionsValidator as TypeMutipleOptionsValidator;

class TypeMutipleOptionsValidatorTest extends TestCase
{
    protected $dataProvider;
    protected $invalidDataProvider;
    private $choice;

    public function setUp()
    {

        $this->choice = $this->getMockBuilder('Application\Interfaces\TypeMultipleOptionsInterface')->getMock();

        $this->dataProvider = [
            'id' => null,
            'Choices' => $this->choice,

        ];

        $this->invalidDataProvider = [
            'id' => null,
            'Choices' => new \DateTime(),

        ];
    }

    public function testValidator()
    {
        $validator = new TypeMutipleOptionsValidator();
        $validator->setData($this->dataProvider);
        $this->assertInstanceOf(TypeMultipleOptionsInterface::class, $this->dataProvider['Choices']);
    }

    public function testInvalidValidator()
    {
        $validator = new TypeMutipleOptionsValidator();
        $validator->setData($this->invalidDataProvider);

        $this->assertFalse($validator->isValid());
        $this->assertArrayHasKey('Choices', $validator->getMessages());


        $this->invalidDataProvider['Choices'] = null;
        $validator->setData($this->invalidDataProvider);

        $this->assertFalse($validator->isValid());
        $this->assertArrayHasKey('isEmpty', $validator->getMessages()['Choices']);
    }
}
