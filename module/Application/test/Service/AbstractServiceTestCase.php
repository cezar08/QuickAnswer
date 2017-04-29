<?php

namespace ApplicationTest\Service;

abstract class AbstractServiceTestCase extends TestCase
{
    /**
     * @var \Doctrine\ORM\Tools\SchemaTool
     */
    private $doctrineORMTool;

    public function setUp()
    {
        parent::setUp();
        $config = include __DIR__ . '/../../../../config/application.config.php';
        $config['module_listener_options']['config_glob_paths'] = [__DIR__ .'/../../../../config/test.config.php'];
        $config['config_cache_enabled'] = false;
        $config['module_map_cache_enabled'] = false;
        $this->setApplicationConfig($config);
        $entityManager = $this->getApplicationServiceLocator()
            ->get('Doctrine\ORM\EntityManager');
        $classes = $entityManager
            ->getMetadataFactory()
            ->getAllMetadata();
        $this->doctrineORMTool = new \Doctrine\ORM\Tools\SchemaTool($entityManager);
        $this->doctrineORMTool->createSchema($classes);
    }

    public function tearDown()
    {
        parent::tearDown();
        $entityManager = $this->getApplicationServiceLocator()
            ->get('Doctrine\ORM\EntityManager');
        $classes = $entityManager
            ->getMetadataFactory()
            ->getAllMetadata();
        $this->doctrineORMTool->dropSchema($classes);
    }
}
