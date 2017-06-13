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
        session_start();
        if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['code'])){

            // Informe o seu App ID abaixoo
            $appId = '1685311895096964';
            $appSecret = '469938ae3d550cae19cf04483dc7d848';
            $redirectUri = urlencode('http://localhost:8080/authfacebook');
            $code = $_GET['code'];
            $token_url ="https://graph.facebook.com/oauth/access_token?"
                ."client_id=" . $appId . "&redirect_uri=" . $redirectUri
                ."&client_secret=" . $appSecret . "&code=" . $code;

            //pega os dados
            $response = @file_get_contents($token_url);
            if($response){
                $params = null;
                parse_str($response, $params);
                if(isset($params['access_token']) && $params['access_token']){
                    $graph_url = "https://graph.facebook.com/me?access_token="
                        . $params['access_token'];
                    $user = json_decode(file_get_contents($graph_url));

                    // nesse IF verificamos se veio os dados corretamente
                    if(isset($user->email) && $user->email){
                        /*
	    *Apartir daqui, você já tem acesso aos dados usuario, podendo armazená-los
	    *em sessão, cookie ou já pode inserir em seu banco de dados para efetuar
	    *autenticação.
	    *No meu caso, solicitei todos os dados abaixo e guardei em sessões.
	    */
                        $_SESSION['email'] = $user->email;
                        $_SESSION['nome'] = $user->name;
                        $_SESSION['localizacao'] = $user->location->name;
                        $_SESSION['uid_facebook'] = $user->id;
                        $_SESSION['user_facebook'] = $user->username;
                        $_SESSION['link_facebook'] = $user->link;
                    }

                } else {
                    echo "Erro de conexão com Facebook";
                    exit(0);
                }
            } else {
                echo "Erro de conexão com Facebook";
                exit(0);
            }

        } else if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['error'])){
            echo 'Permissão não concedida';
        }

    }

    public function gmailAuth($data)
    {
        session_start();

        //Include Google client library
        include_once 'src/Google_Client.php';
        include_once 'src/contrib/Google_Oauth2Service.php';

        /*
         * Configuration and setup Google API
         */
        $clientId = ' 286769268840-a4i9mkqkq25mtcs49plckbnv37la7jdr.apps.googleusercontent.com';
        $clientSecret = ' hMMzNSOMfyzaTPh9NzJ4CJD3';
        $redirectURL = 'http://localhost:8080/login/3/';

        //Call Google API
        $gClient = new Google_Client();
        $gClient->setApplicationName('Login to AGILM.com');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectURL);

        $google_oauthV2 = new Google_Oauth2Service($gClient);
    }
}
