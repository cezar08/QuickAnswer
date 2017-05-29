<?php

namespace Application\Service;

use Application\Interfaces\AuthServiceInterface;
use Doctrine\ORM\EntityManager;
use Zend\Validator\EmailAddress;
use Zend\Validator\StringLength;

class AuthService implements AuthServiceInterface
{

    protected $entityManger;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManger = $entityManager;
    }

    /**
     * @param array $data [['type' => 'string', 'name' => 'email'], ['type' => 'string', 'name' => 'password']]
     * @return array
     */

    public function dataBaseAuth($data)
    {
        $validatorEmail = new EmailAddress();
        $validatorPassword = new StringLength(['min' => 6, 'max' => 32]);
        $emailIsValid = $validatorEmail->isValid($data['email']);
        $passwordIsValid = $validatorPassword->isValid($data['password']);

        if ($emailIsValid && $passwordIsValid) {
            $user = $this->entityManger->getRepository(
                '\Application\Entity\UserEntity'
            )->findOneBy(
                [
                    'email' => $data['email']
                ]
            );

            if (! $user || ! password_verify($data['password'], $user->password)) {
                return ['error' => 'Usuário ou senha inválidos!'];
            }

            $userArray = $user->getArrayCopy();
            unset($userArray['password']);

            return ['success' => $userArray];
        } else {
            return ['error' => [
                'email' => $validatorEmail->getMessages(),
                'password' => $validatorPassword->getMessages()
            ]];
        }
    }


    public function facebookAuth($data)
    {
        /*
         * FUNÇÃO QUE SERÁ IMPLEMENTADA FUTURAMENTE
         */
    }

    public function gmailAuth($data)
    {
        /*
         * FUNÇÃO QUE SERÁ IMPLEMENTADA FUTURAMENTE
         */
    }
}
