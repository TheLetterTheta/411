<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 10/19/2016
 * Time: 17:15 PM
 */
interface IDataUserService
{
    //Takes the WNumber and Password of the student in a POST request,
    // and returns the API Key to be used in all further requests
    public function Login($wNumber, $password);

    //Return all of the users with their WNumber, ACT Scores,
    // FirstName, LastName, and Id
    public function GetUsers();
    public function getUser($userId);
}