<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 8/24/2016
 * Time: 22:15 PM
 */
class FUNCTIONS
{
    public static function CURRENT_URL()    {
        return sprintf(
            "%s://%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME']
            ,$_SERVER['REQUEST_URI']
        );
    }

    public static function BASE_URL(){
        return sprintf(
            "%s://%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME']
        );
    }

    static function GET_GOOGLE_LOGIN($id){
        $client = new Google_Client();
        $client->setClientId('51037973777-2i03a7rmfhlbme4cr518o1mq8661s5fo.apps.googleusercontent.com');
        $client->setClientSecret('Zp87u9QXHEONlEsZlWsCQxgm');
        $client->setRedirectUri(FUNCTIONS::BASE_URL().'/411/phalcon/public/home');
        $client->addScope("email");
        $client->addScope("profile");

        $ticket = $client->verifyIdToken($id);
        if($ticket && $ticket["aud"] == CONSTANTS::GOOGLE_CLIENT_ID)
            return $ticket;
        return null;
    }
}