<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 10/19/2016
 * Time: 17:24 PM
 */
require 'UserService/IUserService.php';
require 'UserService/InMemoryUserService.php';
require 'MajorMinorService/IMajorMinorDataService.php';
require 'MajorMinorService/InMemoryMajorMinorService.php';

class dataServiceConf
{
    public function GetUserDataService(){
        return new InMemoryUserService();
    }
    public function GetMajorMinorService()
    {
        return new InMemoryMajorMinorService();
    }
}