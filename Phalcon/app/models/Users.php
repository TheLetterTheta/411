<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 8/24/2016
 * Time: 15:27 PM
 */

use Phalcon\Mvc\Model;

class Users extends Model
{
    public $userId;
    public $collegeId;
    public $actEnglish;
    public $actMath;
    public $actReading;
    public $actScience;
}