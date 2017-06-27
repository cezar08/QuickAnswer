<?php
/**
 * Created by PhpStorm.
 * User: cezarjuniordesouza
 * Date: 16/06/17
 * Time: 18:20
 */

namespace Application\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class LoginController extends ActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }

    public function authAction()
    {
        $request = $this->getRequest();
        $data = $request->getPost();
        $type = $this->params()->fromRoute('type', 0);

        switch ($type) {
            case 1:
                //chama serviço autenticação facebook
                break;
            case 2:

                //chama serviço autenticação banco

                $data = $this->getRequest()->getPost();

                try {
                    $this->getServiceLocator('AuthService')->facebookAuth($data);
                    return new JsonModel([
                        'succes'=> [
                            'userId' => $data['id'],
                            'email' => $data['email'],
                            'userPicture' => $data['picture']
                        ]
                    ]);

                } catch (Exception $e) {
                    return new JsonModel([
                        'error'=> [
                            'erro' => $e
                        ]
                    ]);
                }

                break;


            case 3:
                //chama serviço com o método autentição Gmail, esse serviço vocês devem verificar se
                //o usuário já existe na base de dados, utilizando o e-mail e o userId por questões de segurança,
                // se não existir vocês devem criá-lo
                //e no retorno abaixo colocar o usuário completo salvo no banco em formato de array
                //
                $data = $this->getRequest()->getPost();
                $gmail = $this->getServiceLocator('AuthService')->gmailAuth($data);

                return new JsonModel($data);
                break;
            default:
                return new JsonModel(['error' => 'Forma de autenticação inválida']);
        }

    }

}