<?php

namespace Application\Validator;


use Application\UserValidator;

use PHPUnit\Framework\TestCase;

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


}