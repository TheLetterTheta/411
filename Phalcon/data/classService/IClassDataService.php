<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 10/20/2016
 * Time: 0:03 AM
 */
interface IClassDataService
{
    public function getClasses();
    public function getClassesById($userId);
    public function getClassHistoryByUserId($userId);
}