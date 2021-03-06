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
                "actEnglish" => 21,
                "actMath" => 21,
                "actReading" => 21,
                "actScience" => 21,
                "actCumulative" => 21,
                "classification" => "Senior",
                "email" => "nicholas.dolan@selu.edu",
                'gpa' => 3.9,
                'transfer' => false
            ),
            array(
                "userId" => 2,
                "wNumber" => "0101010",
                "firstName" => "Joe",
                "lastName" => "Wifi",
                "actEnglish" => 36,
                "actMath" => 36,
                "actReading" => 36,
                "actScience" => 36,
                "actCumulative" => 36,
                "classification" => "Freshman",
                "email" => "Joe.Wifi@selu.edu",
                'gpa' => 4.5,
                'transfer' => true
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