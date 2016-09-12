<?php

use Phalcon\Mvc\Controller;

class HomeController extends Controller
{

    public function indexAction()
    {
    }
    public function loginAction()
    {
        require '/../../../vendor/autoload.php';

        $client = new Google_Client();
        $client->setClientId('51037973777-2i03a7rmfhlbme4cr518o1mq8661s5fo.apps.googleusercontent.com');
        $client->setClientSecret('Zp87u9QXHEONlEsZlWsCQxgm');
        $client->setRedirectUri('http://localhost/411/phalcon/public/home');
        $client->addScope("email");
        $client->addScope("profile");

        $ticket = $client->verifyIdToken($_POST["token"]);
        if ($ticket) {
            $data = $ticket->getAttributes();
            echo $data['payload']['email']; // user ID
            $_SESSION['email']= $data['payload']['email'];
            echo $_SESSION['email'];

        }
    }
    public function sessionAction()
    {
        if(isset($_SESSION['email'])) {

            return json_encode(array('email' => $_SESSION['email']));
        }
        return  json_encode(array());
    }

}