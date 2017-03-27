<?php

namespace ApplicationTest\Validator;


use Application\Validator\UserValidator;
use PHPUnit\Framework\TestCase;

/**
 * Class UserValidatorTest
 * @package ApplicationTest\Validator
 * @group Validator
 */
class UserValidatorTest extends TestCase
{

    protected $dataProvider;

    protected $invalidDataProvider;

    public function setUp()
    {
        parent::setUp();
        $this->dataProvider = [
            'id' => null,
            'name' => 'Joao',
            'password' => 'Xret34Piy',
            'email' => 'joao@gmail.com',
            'picture' => 'img/pictures/AjcKlsdf.jpg',
            'birthDate' => '01/01/1990',
            'typeAuth' => 'FACEBOOK',
            'university' => 'Unochapecó'
        ];
        $this->invalidDataProvider = [
            'name' => '',
            'password' => '',
            'email' => 'maria',
            'picture' => '',
            'birthDate' => '1990/01/01',
            'typeAuth' => 'INSTAGRAM',
            'university' => ''

        ];
    }

    public function testValidator()
    {
        $validator = new UserValidator();
        $validator->setData($this->dataProvider);
        $this->assertTrue($validator->isValid());
    }


}