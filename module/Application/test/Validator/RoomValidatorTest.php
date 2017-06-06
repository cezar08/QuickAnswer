<?php
/**
 * Created by PhpStorm.
 * User: Wesley Sartori
 * Date: 18/04/17
 * Time: 00:44
 */

namespace Application\test\Validator;

use PHPUnit\Framework\TestCase;
use Application\Entity\RoomEntity;
use Application\Validator\RoomValidator;

class RoomValidatorTest extends TestCase
{
    /**
     * Herança
     *
     * Variavel $aux contendo a variavel $salavalidator
     * para execuçao no codesniffer
     *
     * @return void
     */
    public function testInherit()
    {
        $RoomValidator = new RoomValidator();
        $aux = $roomValidator;
        $this->assertInstanceOf('Zend\InputFilter\InputFilter', $aux);
    }

    /**
     * Teste dos Campos
     *
     * @return void
     */
    public function testFields()
    {
        $roomValidator = new RoomValidator();
        $roomValidatorArrayCopy = $roomValidator;
        $roomValidatorFields = array_keys($roomValidatorArrayCopy);

        foreach ($roomValidatorFields as $field) {
            if (! $roomValidator->has($field)) {
                $this->fail($field . 'validação não existente! ');
            }
        }
        $this->assertEquals(6, $roomValidator->count);
        $this->assertCount(6, $roomValidatorFields);
    }

    /**
     * Teste de filtros
     *
     * Variavel $mensagem contem a descrição
     *
     * @return void
     */
    public function testFilters()
    {
        $roomValidator = new RoomValidator();
        $msg = '<a href="www.google.com.br">Sala App</a>';
        $data = ['id' => 'nao pode ser string', 'sem_validacao' => $msg];
        $roomValidator->setData($dados);
        $this->assertTrue($roomValidator->isValid());
        $this->assertEquals(0, $roomValidator->get('id')->getValue());
        $sala = $roomValidator->get('sala_app')->getValue();
        $this->assertEquals('SALA APP', $room);
    }
}
