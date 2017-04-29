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
        $sala->dataCriacao = new \DateTime ['now'];
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
    public function testListar()
    {
    }

    /**
     *
     */
    public function testEditar()
    {
    }

    /**
     *
     */
    public function testExcluir()
    {
    }
}
