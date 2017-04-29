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
        $salaValidatorArrayCopy = $salaValidator;
        $salaValidatorFields = $salaValidatorArrayCopy;

        foreach ($salaValidatorFields as $field) {
            if (! $salaValidator->has($field)) {
                $this->fail($field . 'validação não existente! ');
            }
        }
        //$this->assertEquals($salaValidator);
        //$this->assertCount( $salaValidatorFields);
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
        $nameRoom = '<a href="www.google.com.br">Sala App</a>';
        $dados = ['id' => 'nao pode ser string', 'sem_validacao' => $nameRoom];
        $dateCriacao = '<h3>@treza de agosto</h3>';
        $data = $dateCriacao;
        $dados = ['id' => 'nao pode ser string', 'sem_validacao' => $nameRoom];

        $salaValidator->setData($dados);
        $this->assertFalse($salaValidator->isValid());
        $this->assertEquals(0, $salaValidator->get('id')->getValue());
        $sala = $salaValidator->get('sala_app')->getValue();
        $this->assertEquals('sala_app', $sala);
    }
}
