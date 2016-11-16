<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 10/19/2016
 * Time: 17:17 PM
 */
class InMemoryUserService implements IDataUserService
{
    private $loginResponse;
    private $users;

    public function __construct(){
        $this->loginResponse = array("successful" => true, "apiKey" => "A@^BfgXghbfG58122" ,'userId' => 1);
        $this->users = array(
            array(
                "userId" => 1,
                "wNumber" => "0474731",
                "firstName" => "Nicholas",
                "lastName" => "Dolan",
                "actEnglish" => 24,
                "actMath" => 32,
                "actReading" => 21,
                "actScience" => 34,
                "email" => "nicholas.dolan@selu.edu",
                'gpa' => 3.9
            ),
            array(
                "userId" => 2,
                "wNumber" => "01010101",
                "firstName" => "Joe",
                "lastName" => "Wifi",
                "actEnglish" => 36,
                "actMath" => 36,
                "actReading" => 36,
                "actScience" => 36,
                "email" => "Joe.Wifi@selu.edu",
                'gpa' => 4.5
            )
        );
    }

    public function Login($wNumber, $password){
        return $this->loginResponse;
    }

    public function GetUsers(){
        return $this->users;
    }

    public function getUser($userId)
    {
        foreach($this->users as $user){
            if($user['userId'] == $userId){
                return $user;
            }
        }
        return null;
    }
}