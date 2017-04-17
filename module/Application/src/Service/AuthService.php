<?php

namespace Application\Service;

use Zend\Validator\EmailAddress;
use Zend\Validator\StringLength;

class AuthService
{

    public function dataBaseAuth($data)
    {
        $validatorEmail = new EmailAddress();
        $validatorPassword = new StringLength(['min' => 6, 'max' => 32]);
        $emailIsValid = $validatorEmail->isValid($data['email']);
        $passwordIsValid = $validatorPassword->isValid($data['password']);

        if ($emailIsValid && $passwordIsValid) {
            $response = ['success' => 'Mensagem'];
        } else {
            $response = ['error' => [
                'email' => $validatorEmail->getMessages(),
                'password' => $validatorPassword->getMessages()
            ]];
        }

        return $response;
    }
}
