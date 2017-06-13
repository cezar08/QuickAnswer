<?php
/**
 * Created by PhpStorm.
 * User: unochapeco
 * Date: 12/06/17
 * Time: 21:33
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

    public function getServiceLocator($string)
    {
        return $this->sm->get($string);
    }

}