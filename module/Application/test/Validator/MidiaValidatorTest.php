<?php

namespace ApplicationTest\Validator;

use Application\Interfaces\MidiaEntityInterface;
use Application\Validator\MidiaValidator;
use PHPUnit\Framework\TestCase;

/**
 * Class MidiaValidatorTest
 * @package ApplicationTest\Validator
 * @group Validator
 */
class MidiaValidatorTest extends TestCase
{

    protected $dataProvider;

    protected $invalidDataProvider;

    public function setUp()
    {
        parent::setUp();
        $this->dataProvider = [
            'id' => null,
            'typeOfMidia' => 1,
            'description' => 'fotoTeste',
            'dateMidia' => '17/04/2017',
            'path' => 'img/pictures/teste.jpg'
        ];
        $this->invalidDataProvider = [
            'typeOfMidia' => null,
            'description' => '',
            'dateMidia' => '2017/04/17',
            'path' => null

        ];
    }

    public function testValidator()
    {
        $validator = new MidiaValidator();
        $validator->setData($this->dataProvider);
        $this->assertTrue($validator->isValid());
    }

    public function testInvalidValidator()
    {
        $validator = new MidiaValidator();
        $validator->setData($this->invalidDataProvider);
        $this->assertFalse($validator->isValid());
        $this->assertArrayHasKey('typeOfMidia', $validator->getMessages());
        $this->assertArrayHasKey('isEmpty', $validator->getMessages()['description']);
        $this->assertArrayHasKey('dateMidia', $validator->getMessages());
        $this->assertArrayHasKey('dateFalseFormat', $validator->getMessages()['dateMidia']);
        $this->assertArrayHasKey('dateInvalidDate', $validator->getMessages()['dateMidia']);
        $this->assertArrayHasKey('path', $validator->getMessages());
    }

    public function testFilters()
    {
        $validator = new MidiaValidator();
        $this->dataProvider['description'] = '<a href="www.google.com">fotoTeste</a>                          ';
        $this->dataProvider['id'] = 'teste_erro';
        $validator->setData($this->dataProvider);
        $data = $validator->getValues();
        $this->assertEquals("fotoTeste", $data['description']);
        $this->assertEquals(0, $data['id']);
    }
}
