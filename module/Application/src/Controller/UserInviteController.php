<?php
/**
 * Created by PhpStorm.
 * User: unochapeco
 * Date: 12/06/17
 * Time: 21:40
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class UserInviteController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function inviteAction()
    {
        return new JsonModel();
    }
}