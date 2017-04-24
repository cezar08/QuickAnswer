<?php

namespace ApplicationTest\Validator;

use Application\Entity\UserInviteEntity;
use Application\Validator\UserInviteValidator;
use PHPUnit\Framework\TestCase;

/**
 * Class UserInviteValidatorTest
 * @package ApplicationTest\Validator
 * @group ValidatorInvite
 */
class UserInviteValidatorTest extends TestCase
{
    protected $validData;

    protected $invalidData;

    /**
     * Seta um objeto com dados válidos, e outro
     * com dados inválidos para serem usados nos
     * testes.
     */
    public function setUp()
    {
        parent::setUp();

        $this->validData = [
            'id' => null,
            'user' => 1,
            'room' => 1,
            'accepted' => true
        ];

        $this->invalidData = [
            'id' => null,
            'user' => null,
            'room' => null,
            'accepted' => false
        ];
    }

    /**
     * Testa a inserção de dados válidos
     * para testar o validator.
     */
    public function testValidator()
    {
        $validator = new UserInviteValidator();
        $validator->setData($this->validData);

        $this->assertTrue($validator->isValid());
    }

    /**
     * Testa a inserção de dados inválidos e
     * verifica as mensagens de erro.
     */
    public function testInvalidValidator()
    {
        $validator = new UserInviteValidator();
        $validator->setData($this->invalidData);

        $this->assertFalse($validator->isValid());
        $this->assertArrayHasKey('isEmpty', $validator->getMessages()['user']);
        $this->assertArrayHasKey('isEmpty', $validator->getMessages()['room']);
        $this->assertArrayHasKey('isEmpty', $validator->getMessages()['accepted']);
    }

    /**
     * Teste dos filtros do validator.
     */
    public function testFilters()
    {
        $id = 1;
        $validator = new UserInviteValidator();
        $this->validData['id'] = $id.'String';
        $this->validData['user'] = $id.'String';
        $this->validData['room'] = $id.'String';
        $this->validData['accepted'] = null;
        $validator->setData($this->validData);
        $data = $validator->getValues();

        $this->assertEquals(1, $data['id']);
        $this->assertEquals(1, $data['user']);
        $this->assertEquals(1, $data['room']);
        $this->assertFalse($data['accepted']);
    }
}
