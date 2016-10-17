<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 10/12/2016
 * Time: 17:30 PM
 */
interface IMajorService
{
    public function GetMajors();
    public function GetMinors();
    public function GetMajorsByUserId($userId);
    public function GetMinorsByUserId($userId);
    public function SetMajors($newMajors, $userId);
    public function SetMinors($newMinors, $userId);
}