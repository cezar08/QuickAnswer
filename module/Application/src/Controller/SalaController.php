<?php
/**
* @Wesley gosta de homens
**/

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SalaController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function buscaSalas()
    {

    }
}
