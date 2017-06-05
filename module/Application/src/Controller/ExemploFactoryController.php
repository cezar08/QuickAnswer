<?php
/**
 * Created by PhpStorm.
 * User: unochapeco
 * Date: 05/06/17
 * Time: 19:22
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class ExemploFactoryController extends AbstractActionController
{
    public function indexAction()
    {
        $data = $this->getServiceLocator('FactoryService')
            ->getData();

        return new JsonModel($data);
    }
}