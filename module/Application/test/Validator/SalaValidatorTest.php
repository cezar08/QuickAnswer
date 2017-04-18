<?php
/**
 * Created by PhpStorm.
 * User: Wesley Sartori
 * Date: 18/04/17
 * Time: 00:44
 */

namespace Application\src\Validator;

use PHPUnit\Framework\TestCase;
use Application\src\Validator\SalaValidator;

class SalaValidatorTest extends ModelTestCase
{
    /**
     * Herança
     *
     * Variavel $aux contendo a variavel $ramo_de_negocio_validator
     * para execuçao no codesniffer
     *
     * @return void
     */
    public function testInherit()
    {
        $ramo_de_negocio_validator = new RamoDeNegocioValidator();
        $aux = $ramo_de_negocio_validator;
        $this->assertInstanceOf('Zend\InputFilter\InputFilter', $aux);
    }

    /**
     * Teste de campos
     *
     * @return void
     */
    public function testFields()
    {
        $ramo_de_negocio = new RamoDeNegocio();
        $ramo_de_negocio_validator = new RamoDeNegocioValidator();
        $ramo_de_negocio_array_copy = $ramo_de_negocio->getArrayCopy();
        $ramo_de_negocio_fields = array_keys($ramo_de_negocio_array_copy);

        foreach ($ramo_de_negocio_fields as $field) {

            if (!$ramo_de_negocio_validator->has($field)) {
                $this->fail($field . 'não existe na validação');
            }
        }

        $this->assertEquals(3, $ramo_de_negocio_validator->count());
        $this->assertCount(3, $ramo_de_negocio_fields);
    }

    /**
     * Teste de filtros
     *
     * Variavel $mensagem contem a descrição do ramo
     *
     * @return void
     */
    public function testFilters()
    {
        $ramo_de_negocio_validator = new RamoDeNegocioValidator();
        $mensagem = '<a href="www.google.com.br">Ramo Industria</a>';
        $dados = array(
            'id' => 'nao pode ser string', 'desc_ramo_de_negocio' => $mensagem
        );
        $ramo_de_negocio_validator->setData($dados);
        $this->assertTrue($ramo_de_negocio_validator->isValid());
        $this->assertEquals(0, $ramo_de_negocio_validator->get('id')->getValue());
        $desc = $ramo_de_negocio_validator->get('desc_ramo_de_negocio')->getValue();
        $this->assertEquals('RAMO INDUSTRIA', $desc);
    }
}