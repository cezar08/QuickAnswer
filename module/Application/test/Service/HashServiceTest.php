<?php
//Ederson da Silva.
//Sistemas de Informação.
//Criando um teste para a função HashService.

namespace ApplicationTest\Service;


use Application\Service\HashService;

/**
 * Class HashServiceTest
 * @package ApplicationTest\Service
 * @group Service
 */
class HashServiceTest extends AbstractServiceTestCase

{

    public function setUp()
    {
        parent::setUp();
    }

    public function testUniqueURL()
    {
        $service = $this->getApplicationServiceLocator()
            ->get('HashService');
        $url1 = $service->returnHash();
        $ur2 = $service->returnHash();
        $this->assertNotEquals($url1, $url1);
    }

    public function testQtdCharacteres()
    {
        $service = $this->getApplicationServiceLocator()
            ->get('HashService');
        $url = $service->returnHash();
        $this->assertEquals(32, strlen($url));
    }


}