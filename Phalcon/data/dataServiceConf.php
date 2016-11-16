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
require 'classService/IClassDataService.php';
require 'classService/InMemoryClass.php';
require 'Planner/IPlannerDataService.php';
require 'Planner/InMemoryPlannerDataService.php';

class dataServiceConf
{
    public function GetUserDataService(){
        return new InMemoryUserService();
    }
    public function GetMajorMinorService()
    {
        return new InMemoryMajorMinorService();
    }
    public function GetClassService()
    {
        return new InMemoryClass();
    }
    public function GetPlannerDataService(){
        return new InMemoryPlannerDataService();
    }
}