<?php

namespace ApplicationTest\Validator;

use Application\Interfaces\MediaEntityInterface;
use Application\Validator\MediaValidator;
use PHPUnit\Framework\TestCase;

/**
 * Class MediaValidatorTest
 * @package ApplicationTest\Validator
 * @group Validator
 */
class MediaValidatorTest extends TestCase
{

    protected $dataProvider;

    protected $invalidDataProvider;

    public function setUp()
    {
        parent::setUp();
        $this->dataProvider = [
            'id' => null,
            'typeOfMedia' => 1,
            'description' => 'fotoTeste',
            'dateOfMedia' => '17/04/2017',
            'path' => 'img/pictures/teste.jpg'
        ];
        $this->invalidDataProvider = [
            'typeOfMedia' => null,
            'description' => '',
            'dateOfMedia' => '2017/04/17',
            'path' => null

        ];
    }

    public function testValidator()
    {
        $validator = new MediaValidator();
        $validator->setData($this->dataProvider);
        $this->assertTrue($validator->isValid());
    }

    public function testInvalidValidator()
    {
        $validator = new MediaValidator();
        $validator->setData($this->invalidDataProvider);
        $this->assertFalse($validator->isValid());
        $this->assertArrayHasKey('typeOfMedia', $validator->getMessages());
        $this->assertArrayHasKey('isEmpty', $validator->getMessages()['description']);
        $this->assertArrayHasKey('dateOfMedia', $validator->getMessages());
        $this->assertArrayHasKey('dateFalseFormat', $validator->getMessages()['dateOfMedia']);
        $this->assertArrayHasKey('dateInvalidDate', $validator->getMessages()['dateOfMedia']);
        $this->assertArrayHasKey('path', $validator->getMessages());
    }

    public function testFilters()
    {
        $validator = new MediaValidator();
        $this->dataProvider['description'] = '<a href="www.google.com">fotoTeste</a>                          ';
        $this->dataProvider['id'] = 'teste_erro';
        $validator->setData($this->dataProvider);
        $data = $validator->getValues();
        $this->assertEquals("fotoTeste", $data['description']);
        $this->assertEquals(0, $data['id']);
    }
}
