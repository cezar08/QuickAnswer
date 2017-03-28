<?php

namespace ApplicationTest\Validator;



use PHPUnit\Framework\TestCase;
use Application\Validator\UserValidator as UserValidator;

/**
 * Class UserValidatorTest
 * @package Application\Validator
 * @group Validator
 */
class UserValidatorTest extends TestCase
{

    protected $dataProvider;

    protected $invalidDataProvider;

    public function setUp(){
        parent::setUp();
        $this->dataProvider = [
            'id' => null,
            'name' => "Teste",
            'password' => "Xret34Pi",
            'email' => "teste@gmail.com",
            'pictures' => "img/pictures/test.jpg",
            'birthDate' => "01/01/1990",
            'typeAuth' => "FACEBOOK",
            '$universitie' => "Unochapeco"
        ];

        $this->invalidDataProvider = [
            'id' => null,
            'name' => "",
            'password' => "",
            'email' => "maria",
            'pictures' => "",
            'birthDate' => "1990/01/01",
            'typeAuth' => "INSTAGRAM",
            '$universitie' => ""
        ];
    }

    public function testValidator(){
        $validator = new UserValidator();
        $validator->setData($this->dataProvider);
        $this->assertTrue($validator->isValid());
    }

    public function testInvalidValidator(){
        $validator = new UserValidator();
        $validator->setData($this->invalidDataProvider);

        $this->assertFalse($validator->isValid());
        $this->assertArrayHasKey('name', $validator->getMessages());
        $this->assertArrayHasKey('isEmpty', $validator->getMessages()['name']);
        $this->assertArrayHasKey('birthDate', $validator->getMessages());
        $this->assertArrayHasKey('dateFalseFormat', $validator->getMessages()['birthDate']);
        $this->assertArrayHasKey('dateInvalidDate', $validator->getMessages()['birthDate']);
        $this->assertArrayHasKey('typeAuth', $validator->getMessages());
        $this->assertArrayHasKey('notInArray', $validator->getMessages()['typeAuth']);
    }

    public function testFilters(){
        $validator = new UserValidator();
        $this->dataProvider['name'] = '<a href="www.google.com.br">Joao</a>';
        $this->dataProvider['id'] = 'Panqueca';
        $validator->setData($this->dataProvider);
        $data = $validator->getValues();
        $this->assertEquals("Joao", $data['name']);
        $this->assertEquals(0, $data['id']);
    }


}