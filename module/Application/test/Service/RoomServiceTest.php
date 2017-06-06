<?php
    namespace Application\test\Service;

    use Application\Entity\RoomEntity as Room;
    use Application\SalaService;
    use Zend\Stdlib\ArrayUtils;

    /**
     * Class SalaServiceTest
     * @package Application\test\Service
     */
class RoomServiceTest extends \ApplicationTest\Service\AbstractServiceTestCase
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
        'roomName' => 'Sala do Cezinha',
        'createDate' => '10/08/1945',
        'type' => 'Privada',
        'user' => 1,
        'question' => 1
        ];

        $this->invalidData = [
        'roomName' => ' ',
        'createDate' => 'dez de agosto',
        'type' => 1,
        'user' => 'marcos',
        'question' => 'jean'
        ];

        $room = new Room();
        $room->roomName = $this->validData['roomName'];
        $room->createDate = new \DateTime;
        $room->type = $this->validData['type'];
        $room->user = $this->validData['user'];
        $room->question = $this->validData['question'];
        $em = $this->getApplicationServiceLocator()->get('Doctrine\ORM\EntityManager');
        $em->persist($room);
        $em->flush();
    }

    /**
     * Teste de cadastro de uma sala
     */
    public function testCadastrar($room)
    {
        $room_service = $this->getService('RoomService');
        $room_service->setServiceManager($this->getServiceManager());
        $data['roomName'] = 'Sala 101';
        $data['createDate'] = '08/08/1998';
        $data['type'] = 'Publica';
        $data['user'] = 1;
        $data['question'] = 3;
        $room_service->create($data);

        $data = $this->getEntityManager()->getRepository('\Application\Entity\RoomEntity')->findAll();
        $this->assertCount(1, $data);
        $room = $data[0]->roomName;
        $this->assertEquals('Sala 101', $room);
        $room = $data[0]->createDate;
        $this->assertEquals('08/08/1998', $room);
        $room = $data[0]->type;
        $this->assertEquals('Publica', $room);
        $room = $data[0]->user;
        $this->assertEquals(1, $room);
        $room = $data[0]->question;
        $this->assertEquals(2, $room);
    }

    /**
     * Teste para listar os dados da Sala
     */
    public function testList()
    {
        $room_service = $this->getService('RoomService');
        $room_service->setServiceManager($this->getServiceManager());
        $data['roomName'] = 'Sala 101';
        $data['createDate'] = '08/08/1998';
        $data['type'] = 'Publica';
        $data['user'] = 1;
        $data['question'] = 3;

        $room_service->create($data);

        $data['id'] = 1;
        $this->assertEquals(1, $room_service->list($data)[0]->id);
        $this->assertEquals(
            'Sala 101',
            $room_service->list($data)[1]->roomName,
            '08/08/1998',
            $room_service->list($data)[1]->createDate,
            'Publica',
            $room_service->list($data)[1]->type,
            1,
            $room_service->list($data)[1]->user,
            3,
            $room_service->testList($data)[1]->question
        );
    }

    /**
     * Teste de atualização dos dados
     */
    public function testEdit()
    {
        $room_service = $this->getService('RoomService');
        $room_service->setServiceManager($this->getServiceManager());
        $data['roomName'] = 'Sala 101';
        $data['createDate'] = '08/08/1998';
        $data['type'] = 'Publica';
        $data['user'] = 1;
        $data['question'] = 3;
        $room_service->create($data);

        $room_edit = $room_service->searchRoom($data['roomName']);
        $room = $this->getService('RoomService');
        $data['roomName'] = 'Nova Sala';
        $room_service->dataForEdit($data, $room_edit);

        $data = $this->getEntityManager()->getRepository('\Application\Entity\RoomEntity')->findAll();
        $this->assertCount(1, $data);
        $room = $data[0]->roomName;
        $this->assertEquals('Nova Sala', $room);
    }

    /**
     * Teste de exclusão de dados por um id
     */
    public function testExcluir()
    {
        $room_service = $this->getService('RoomService');
        $room_service->getServiceManager($this->getServiceManager());
        $data ['roomName'] = 'Sala 101';
        $data['createDate'] = '08/08/1998';
        $data['type'] = 'Publica';
        $data['user'] = 1;
        $data['question'] = 3;

        $room_service->create($data);
        $data = $this->getEntityManager()
            ->find('Application\Entity\RoomEntity', '1');
        $room_service->delete($data);
        $data = $this->getEntityManager()
            ->getRepository('Application\Entity\RoomEntity')->findAll();
        $this->assertCount(0, $data);
    }
}
