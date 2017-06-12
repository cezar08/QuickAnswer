<?php
/**
 * Created by PhpStorm.
 * User: unochapeco
 * Date: 15/05/17
 * Time: 20:55
 */

namespace Application\Controller;


use OAuth2\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;
use ZF\OAuth2\Controller\AuthController;
use ZF\OAuth2\Provider\UserId\UserIdProviderInterface;

class UsersController extends AuthController
{


    public function __construct(callable $serverFactory, UserIdProviderInterface $userIdProvider)
    {
        parent::__construct($serverFactory, $userIdProvider);
    }

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
        $server = call_user_func($this->serverFactory, "auth");

        if(!$server->verifyResourceRequest(Request::createFromGlobals())){
            $this->getResponse()->setStatusCode(401);

            return $this->getResponse();
        }

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