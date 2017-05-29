<?php
/**
* @Wesley gosta de homens
**/

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SalaController extends AbstractActionController {
    public function indexAction() {
        $salas = ['Sala1', 'Sala2', 'Sala3']; //executa o serviço q vai no banco e pega as salas

        return new ViewModel(['salas' => $salas]);
    }

    public function buscaSalasAction(){

    }

    public function buscarSalasAction()
    {

    }

    public function criarSalaAction()
    {

    }

    public function editarSalaAction()
    {

    }

    public function excluirSalaAction()
    {

    }

    public function listarSalasAction()
    {
        
    }
}
