<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 10/19/2016
 * Time: 18:30 PM
 */
interface IMajorMinorDataService
{
    public function getMajors($userId);
    public function getMinors($userId);
    public function getUserMajors($userId);
    public function getUserMinors($userId);
}