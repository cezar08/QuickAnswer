<?php
/**
 * Created by PhpStorm.
 * User: unochapeco
 * Date: 05/06/17
 * Time: 19:25
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;

abstract class ActionController extends AbstractActionController
{
    protected $sm;

    public function __construct($serviceManager)
    {
        $this->sm = $serviceManager;
    }

    public function getServiceLocator($serviceName)
    {
        return $this->sm->get($serviceName);
    }
}