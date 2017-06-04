<?php
/**
 * Created by PhpStorm.
 * User: unochapeco
 * Date: 15/05/17
 * Time: 20:55
 */

namespace Application\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class UsersController extends AbstractActionController
{


    /**
     * GET /users/[:id]
     */
    public function fetchAction()
    {

    }

    /**
     * GET /users
     */
    public function fetchAllAction()
    {
       return new JsonModel([
            'Pedro',
            'Maria',
            'Joana'
        ]);
    }

    /**
     * POST /users
     */
    public function createAction()
    {
        return new JsonModel(
            ['success' =>
                ['id' => 1, 'name' => 'Maria']
            ]
        );
    }

    /**
     * PUT /users/[:id]
     */
    public function updateAction()
    {
        return new JsonModel(
            ['success' => 'Alterado com sucesso!']
        );
    }

    /**
     * DELETE /users/[:id]
     */
    public function deleteAction()
    {

    }

}