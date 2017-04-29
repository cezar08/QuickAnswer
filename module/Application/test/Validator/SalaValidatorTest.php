<?php
/**
 * Created by PhpStorm.
 * User: Wesley Sartori
 * Date: 18/04/17
 * Time: 00:44
 */

namespace Application\test\Validator;

use PHPUnit\Framework\TestCase;
use Application\Entity\SalaEntity;
use Application\Validator\SalaValidator;

class SalaValidatorTest extends TestCase
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
        $salaValidator = new SalaValidator();
        $aux = $salaValidator;
        $this->assertInstanceOf('Zend\InputFilter\InputFilter', $aux);
    }

    /**
     * Teste dos Campos
     *
     * @return void
     */
    public function testFields()
    {
        $salaValidator = new SalaValidator();
        $salaValidatorArrayCopy = $salaValidator->getArrayCopy();
        $salaValidatorFields = array_key($salaValidatorArrayCopy);

        foreach ($salaValidatorFields as $field) {
            if (! $salaValidator->has($field)) {
                $this->fail($field . 'validação não existente! ');
            }
        }
        $this->assertEquals(6, $salaValidator->count);
        $this->assertCount(6, $salaValidatorFields);
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
        $salaValidator = new SalaValidator();
        $mensagem = '<a href="www.google.com.br">Sala App</a>';
        $dados = ['id' => 'nao pode ser string', 'sem_validacao' => $mensagem];
        $salaValidator->setData($dados);
        $this->assertTrue($salaValidator->isValid());
        $this->assertEquals(0, $salaValidator->get('id')->getValue());
        $sala = $salaValidator->get('sala_app')->getValue();
        $this->assertEquals('SALA APP', $sala);
    }
}
