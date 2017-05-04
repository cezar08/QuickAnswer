<?php
    namespace Application\test\Service;

    use Application\Entity\SalaEntity as Sala;
    use Application\SalaService;
    use Zend\Stdlib\ArrayUtils;

    /**
     * Class SalaServiceTest
     * @package Application\test\Service
     */
class SalaServiceTest extends \ApplicationTest\Service\AbstractServiceTestCase
{

    /**
     * @var array
     */
private $validData;

    /**
     * @var array
     */
private $invalidData;

    /**
     *
     */
public function setUp()
{
    parent::setUp();
    $this->validData = [
    'nomeSala' => 'Sala do Cezinha',
    'dataCriacao' => '10/08/1945',
    'tipo' => 'Privada',
    'usuario' => 1,
    'perguntas' => 1
    ];

    $this->invalidData = [
    'nomeSala' => ' ',
    'dataCriacao' => 'dez de agosto',
    'tipo' => 1,
    'usuario' => 'marcos',
    'perguntas' => 'jean'
    ];

    $sala = new Sala();
    $sala->nomeSala = $this->validData['nomeSala'];
    $sala->dataCriacao = new \DateTime;
    $sala->tipo = $this->validData['tipo'];
    $sala->usuario = $this->validData['usuario'];
    $sala->perguntas = $this->validData['perguntas'];
    $em = $this->getApplicationServiceLocator()
    ->get('Doctrine\ORM\EntityManager');
    $em->persist($sala);
    $em->flush();
}

    /**
     *
     */

public function testListar ()
    {
    $room_service = $this->getService('SalaService');
    $room_service->setServiceManager($this->getServiceManager());
    $dados['id'] = 1; $dados['nomeSala'] = 'SalaTeste';
    $dados['dataCriacao'] = '10/08/2016';
    $dados['tipo'] = ['Privado'];
    $dados['usuario'] = ['Jean']; $dados['perguntas'] = ['Testando A pergunta'];
    $room_service->cadastrar($dados);
    $dados['id'] = 1;
        $this->assertEquals (1,     $room_service->listar($dados)[0]->id);
        $this->assertEquals ('SalaTeste', $room_service->listar($dados)[0]->nomeSala);
        $this->assertEquals ('10/08/2016', $room_service->listar($dados)[0]->dataCriacao);
        $this->assertEquals ("Privado", $room_service->listar($dados)[0]->tipo); 
        $this->assertEquals ('Jean', $room_service->listar($dados)[0]->usuario); 
        $this->assertEquals ('Pergunta se o Cezar ganha no FIFA');
        $room_service->listar($dados)[0]->perguntas;
}

    /**
     *
     */
    public function testExcluir()
    {
        $salaService = new Sala();
        $dados['id'] = 1;
        $dados['nomeSala'] = 'SalaTeste';
        $dados['dataCriacao'] = '10 / 08 / 2016';
        $dados['tipo'] = ['Privado'];
        $dados['usuario'] = ['Jean'];
        $dados['perguntas'] = ['Testando A pergunta'];
        //$salaService->setDataDados;
        $salaService->cadastrar($dados);
        $dados['id'] = 1;
        $salaService->excluir($dados['id']);
        $retorno = $salaService->listar();
        $this->assertCount(0, $retorno);
    }
}
