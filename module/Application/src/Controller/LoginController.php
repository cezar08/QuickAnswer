<?php
/**
 * Created by PhpStorm.
 * User: unochapeco
 * Date: 15/05/17
 * Time: 20:06
 */

namespace Application\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Helper\ViewModel;

class LoginController extends AbstractActionController
{
    public function loginAction()
    {
        return new ViewModel();
    }
}