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
        $salas = ['Sala1', 'Sala2', 'Sala3']; //executa o serviço q vai no banco e pega as salas

        return new ViewModel(['salas' => $salas]);
    }

<<<<<<< HEAD
    public function buscaSalasAction()
=======
    public function buscarSalasAction()
>>>>>>> 895279ff0ba9f4372001c5d8c92215c43866f262
    {
        //pastel
    }

    public function criarSalaAction()
    {
        //pastel
    }

    public function editarSalaAction()
    {
        //pastel
    }

    public function excluirSalaAction()
    {
        //pastel
    }

    public function listarSalasAction()
    {
        //pastel
    }
}
