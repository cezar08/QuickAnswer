<?php
    namespace Spn\Service;

    use PHPUnit\Framework\TestCase;
    use QuickAnswer\Module\Application\src\Entity\SalaEntity;
    use QuickAnswer\Module\Application\src\Validator\SalaValidator;

    class SalaServiceTest extends ModelTestCase
    {
        public function testCadastrar ()
        {
            $salaService = $this->getService('SalaService');
            $salaService->setServiceManager($this->getServiceManager());
            $dados['nomeSala'] = 'Sala do Cezinha';
            $dados['dataCriacao'] = '10/08/1945';
            $dados['tipo'] = 'Privada';
            $dados['usuario'] = 1;
            $dados['perguntas'] = 1;

            $salaService->cadastrar($dados);

            $dados = $this->getEntityManager()
                ->getRepository('QuickAnswer\Module\Application\src\Entity\SalaEntity')->findAll();
            $this->assertCount(1, $dados);
            $sala = $dados[0]->nomeSala;
            $this->assertEquals('Sala do Cezinha', $sala);

            //CONTINUAR
        }

        public function testListar ()
        {

        }

        public function testEditar ()
        {

        }

        public function testExcluir ()
        {

        }
    }
?>
