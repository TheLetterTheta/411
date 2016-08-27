<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 8/24/2016
 * Time: 15:27 PM
 */

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Message;
use Phalcon\Mvc\Model\Validator\Uniqueness;
use Phalcon\Mvc\Model\Validator\InclusionIn;

class Users extends Model
{
    public $UserId;
    public $CollegeId;
    public $TestEnglish;
    public $TestMath;
    public $TestReading;
    public $TestScience;
    public $IsAct;
    public $IsActive;
    public $LastModifiedDate;

    public function validation()
    {

        //Act scores must be between 0 and 36 and not null
        if($this->IsAct == true && ($this->TestEnglish < 0 || $this->TestEnglish > 36)){
            $this->appendMessage(new Message("ACT English score must be between 0 and 36"));
        }
        else if( $this->IsAct == false && ($this->TestEnglish < 200 || $this->TestEnglish > 800)){
            $this->appendMessage(new Message("SAT English score must be between 0 and 800"));
        }

        if($this->IsAct == true && ($this->TestMath < 0 || $this->TestMath > 36)){
            $this->appendMessage(new Message("ACT Math score must be between 0 and 36"));
        }
        else if($this->IsAct == false && ($this->TestMath < 200 || $this->TestMath > 800) ){
            $this->appendMessage(new Message("SAT Math score must be between 0 and 800"));
        }

        if($this->IsAct == true && ($this->TestReading < 0 || $this->TestReading > 36)){
            $this->appendMessage(new Message("ACT Reading score must be between 0 and 36"));
        }

        if($this->IsAct ==true && ($this->TestScience < 0 || $this->TestScience > 36)){
            $this->appendMessage(new Message("ACT Science score must be between 0 and 36"));
        }

        //Non null constraint
        if($this->IsAct == null){
            $this->appendMessage(new Message("You must specify if you are using the ACT test or not"));
        }

        // Check if any messages have been produced
        if ($this->validationHasFailed()) {
            return false;
        }
    }
}