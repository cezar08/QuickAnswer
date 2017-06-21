<?php
/**
 * Created by PhpStorm.
 * User: unochapeco
 * Date: 05/06/17
 * Time: 19:27
 */

namespace Application\Controller;


use Zend\Mvc\Controller\AbstractActionController;

class ActionController extends AbstractActionController
{
    protected $sm;

    public function __construct($serviceManager)
    {
        $this->sm = $serviceManager;

    }

    public function getServiceLocator($service)
    {
        return $this->sm->get($service);
    }
}