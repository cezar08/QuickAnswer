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
        $em = $this->getApplicationServiceLocator()->get('Doctrine\ORM\EntityManager');
        $em->persist($sala);
        $em->flush();
    }

    /**
     * Teste de cadastro de uma sala
     */
    public function testCadastrar($sala)
    {
        $room_service = $this->getService('RoomService');
        $room_service->setServiceManager($this->getServiceManager());
        $data['nomeSala'] = 'Sala 101';
        $data['dataCriacao'] = '08/08/1998';
        $data['tipo'] = 'Publica';
        $data['usuario'] = 1;
        $data['perguntas'] = 3;
        $room_service->cadastrar($data);

        $data = $this->getEntityManager()->getRepository('\Application\Entity\SalaEntity')->findAll();
        $this->assertCount(1, $data);
        $room = $data[0]->nomeSala;
        $this->assertEquals('Sala 101', $sala);
        $room = $data[0]->dataCriacao;
        $this->assertEquals('08/08/1998', $sala);
        $room = $data[0]->tipo;
        $this->assertEquals('Publica', $sala);
        $room = $data[0]->usuario;
        $this->assertEquals(1, $sala);
        $room = $data[0]->perguntas;
        $this->assertEquals(2, $sala);
    }

    /**
     * Teste para listar os dados da Sala
     */
    public function testListar()
    {
        $room_service = $this->getService('RoomService');
        $room_service->setServiceManager($this->getServiceManager());
        $data['nomeSala'] = 'Sala 101';
        $data['dataCriacao'] = '08/08/1998';
        $data['tipo'] = 'Publica';
        $data['usuario'] = 1;
        $data['perguntas'] = 3;

        $room_service->cadastrar($data);

        $data['id'] = 1;
        $this->assertEquals(1, $room_service->listar($data)[0]->id);
        $this->assertEquals(
            'Sala 101',
            $room_service->listar($data)[1]->nomeSala,
            '08/08/1998',
            $room_service->listar($data)[1]->dataCriacao,
            'Publica',
            $room_service->listar($data)[1]->tipo,
            1,
            $room_service->listar($data)[1]->usuario,
            3,
            $room_service->testListar($data)[1]->perguntas
        );
    }

    /**
     * Teste de atualização dos dados
     */
    public function testEditar()
    {
        $room_service = $this->getService('RoomService');
        $room_service->setServiceManager($this->getServiceManager());
        $data['nomeSala'] = 'Sala 101';
        $data['dataCriacao'] = '08/08/1998';
        $data['tipo'] = 'Publica';
        $data['usuario'] = 1;
        $data['perguntas'] = 3;
        $room_service->cadastrar($data);

        $room_edit = $room_service->buscaSala($data['nomeSala']);
        $room = $this->getService('RoomService');
        $data['nomeSala'] = 'Nova Sala';
        $room_service->dadosParaEditar($data, $room_edit);

        $data = $this->getEntityManager()->getRepository('\Application\Entity\SalaEntity')->findAll();
        $this->assertCount(1, $data);
        $room = $data[0]->nomeSala;
        $this->assertEquals('Nova Sala', $sala);
    }

    /**
     * Teste de exclusão de dados por um id
     */
    public function testExcluir()
    {
        $room_service = $this->getService('RamoDeNegocioService');
        $room_service->getServiceManager($this->getServiceManager());
        $data ['nomeSala'] = 'Sala 101';
        $data['dataCriacao'] = '08/08/1998';
        $data['tipo'] = 'Publica';
        $data['usuario'] = 1;
        $data['perguntas'] = 3;

        $room_service->cadastrar($data);
        $data = $this->getEntityManager()
            ->find('Application\Entity\SalaEntity', '1');
        $room_service->excluir($data);
        $data = $this->getEntityManager()
            ->getRepository('Application\Entity\SalaEntity')->findAll();
        $this->assertCount(0, $data);
    }
}
