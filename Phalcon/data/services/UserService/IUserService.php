<?php

/**
 * Created by PhpStorm.
 * User: Jessie Badon
 * Date: 10/12/2016
 * Time: 4:12 PM
 */
interface IUserService
{
    public function Login($wNumber, $encryptedPassword);
}