<?php

use Phalcon\Di;

class UserService implements IUserService
{
    private $di;
    public function __construct()
    {
        $this->di = DI::getDefault();
    }

    public function Login($wNumber, $password){
        return $this->di["dataUserService"]->Login($wNumber,$password);
    }

    public function GetUsers(){
        return $this->di["dataUserService"]->GetUsers();
    }
    public function getUser($userId)
    {
        return $this->di["dataUserService"]->getUser($userId);
    }
}