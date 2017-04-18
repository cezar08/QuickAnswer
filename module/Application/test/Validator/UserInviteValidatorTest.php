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
            'id_user' => 1,
            'id_sala' => 1
        ];

        $this->invalidData = [
            'id' => null,
            'id_user' => null,
            'id_sala' => null
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
        $this->assertArrayHasKey('isEmpty', $validator->getMessages()['id_user']);
        $this->assertArrayHasKey('isEmpty', $validator->getMessages()['id_sala']);
    }

    /**
     * Teste dos filtros do validator.
     */
    public function testFilters()
    {
        $id = 1;
        $validator = new UserInviteValidator();
        $this->validData['id'] = $id.'String';
        $this->validData['id_user'] = $id.'Strign';
        $this->validData['id_sala'] = $id.'String';
        $validator->setData($this->validData);
        $data = $validator->getValues();

        $this->assertEquals(1, $data['id']);
        $this->assertEquals(1, $data['id_user']);
        $this->assertEquals(1, $data['id_sala']);
    }
}
