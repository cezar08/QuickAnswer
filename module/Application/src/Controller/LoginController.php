<?php
/**
 * Created by PhpStorm.
 * User: unochapeco
 * Date: 15/05/17
 * Time: 20:05
 */

namespace Application\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class LoginController extends ActionController
{

    public function loginAction()
    {

        $type = $this->params()->fromRoute("type", 0);
        // 0 e o erro 0 nao foi certo algo assim

        switch ($type){


            case 1: //banco de dados

                break;


            case 2: //facebook
                $data = $this->getRequest()->getPost();

                $this->getServiceLocator('AuthService')->facebookAuth($data);

                break;


            case 3://gmaill

                break;
        }

        return new ViewModel();
    }

}