<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 10/16/2016
 * Time: 16:03 PM
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
}