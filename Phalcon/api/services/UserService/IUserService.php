<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 10/19/2016
 * Time: 17:54 PM
 */
interface IUserService
{
    public function Login($wNumber, $password);
    public function GetUsers();
    public function getUser($userId);
}