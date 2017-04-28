<?php
    namespace Application\test\Service;

    use PHPUnit\Framework\TestCase;
    use Application\Entity\SalaEntity as Sala;

    /**
     * Class SalaServiceTest
     * @package Application\test\Service
     */
class SalaServiceTest extends \ApplicationTest\Entity\SalaTest
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
        $sala->dataCriacao = $this->validData['dataCriacao'];
        $sala->tipo = $this->validData['tipo'];
        $sala->usuario = $this->validData['usuario'];
        $sala->perguntas = $this->validData['perguntas'];
        $entityManager = $this->getApplicationServiceLocator()
            ->get('Doctrine\ORM\EntityManager');
        $entityManager->persist($sala);
        $entityManager->flush();
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
