<?php

namespace ApplicationTest\Service;

use Application\Service\AuthService;
use Zend\Stdlib\ArrayUtils;

/**
 *
 * Class AuthServiceTest
 * @group Service
 */
class AuthServiceTest extends \ApplicationTest\Service\AbstractServiceTestCase
{

    /**
     * @var array
     */
    private $validData;

    /**
     * @var array
     */
    private $invalidData;

    public function setUp()
    {
        parent::setUp();
        $this->validData = [
            'email' => "joao@gmail.com",
            'password' => "aeRtX21"
        ];
        $this->invalidData = [
            'email' => 'joao',
            'password' => ''
        ];
    }

    public function testDataBaseAuth()
    {
        $serviceAuth = $this->getApplicationServiceLocator()
            ->get('AuthService');
        $this->assertArrayHasKey("success", $serviceAuth->dataBaseAuth(
            $this->validData
        ));
        $response = $serviceAuth->dataBaseAuth($this->invalidData);
        $this->assertArrayHasKey("error", $response);
    }
}
