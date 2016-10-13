<?php

/**
 * Created by PhpStorm.
 * User: Jessie Badon
 * Date: 10/12/2016
 * Time: 4:15 PM
 */
class InMemoryUserService implements IUserService
{

    public function Login($wNumber, $encryptedPassword)
    {
        $user = new User();

        $user->id = 1;
        $user->firstName = 'Harambe';
        $user->lastName = 'VanKlansman';
        $user->englishActScore = 28;
        $user->mathActScore = 25;
        $user->readingActScore = 32;
        $user->scienceActScore = 25;
        $user->isActive = true;
        $user->lastModifided = time();
        
        return $user;
    }
}