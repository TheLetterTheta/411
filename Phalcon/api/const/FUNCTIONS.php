<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 8/24/2016
 * Time: 22:15 PM
 */
use Phalcon\Http\Request;

class FUNCTIONS
{
	public static function CURRENT_URL()    {
        return sprintf(
            "%s://%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['HTTP_HOST']
            ,$_SERVER['REQUEST_URI']
        );
    }

    public static function BASE_URL(){
        return sprintf(
            "%s://%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['HTTP_HOST']
        );
    }

    public static function DATA_API_URL(){
        return sprintf(
            "%s://%s%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['HTTP_HOST'],
            CONSTANTS::FILE_PATH,
            "/api"
        );
    }
}