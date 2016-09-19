<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 8/24/2016
 * Time: 22:15 PM
 */
class FUNCTIONS
{
    public static function UserGoogleTokenVarify($token)
    {

        $client = new Google_Client();
        $client->setClientId('51037973777-2i03a7rmfhlbme4cr518o1mq8661s5fo.apps.googleusercontent.com');
        $client->setClientSecret('Zp87u9QXHEONlEsZlWsCQxgm');
        $client->setRedirectUri('http://localhost/411/phalcon/public/home');
        $client->addScope("email");
        $client->addScope("profile");

        $ticket = $client->verifyIdToken($token);

        if($ticket)
        {
           return $ticket;
        }
        return null;
    }
}