<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 10/19/2016
 * Time: 20:29 PM
 */
interface IMajorMinorService
{
    public function getMajors();
    public function getMinors();
    public function getUserMajors($userId);
    public function getUserMinors($userId);
}