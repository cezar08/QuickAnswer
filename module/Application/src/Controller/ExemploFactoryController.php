<?php
/**
 * Created by PhpStorm.
 * User: unochapeco
 * Date: 05/06/17
 * Time: 19:23
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class ExemploFactoryController extends AbstractActionController{

    public function indexAction(){

        $data = $this->getServiceLocator('nomeServico');

    }



}