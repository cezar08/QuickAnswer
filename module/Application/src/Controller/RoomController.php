<?php
/**
* @Wesley gosta de homens
**/

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class RoomController extends AbstractActionController
{
    public function indexAction()
    {
        $rooms = ['Room 1', 'Room 2', 'Room 3']; //executa o serviço q vai no banco e pega as salas

        return new ViewModel(['rooms' => $rooms]);
    }

    public function searchRoomsAction()
    {
    }

    public function createRoomAction()
    {
    }

    public function editRoomAction()
    {
    }

    public function deleteRoomAction()
    {
    }

    public function listRoomAction()
    {
        $rooms = $this->getService('RoomService')->listTemporary;

        return $rooms;
    }

}
