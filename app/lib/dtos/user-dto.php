<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/1/2016
 * Time: 22:47 PM
 */
class UserDTO
{
    public $UserId;
    public $CollegeId;
    public $Email;
    public $ApiKey;
    public $FirstName;
    public $LastName;
    public $UserCredits;
    public $Classification;
    public $GPA;

    function __construct(array $dataRow = null)
    {
        if($dataRow != null){
            $this->UserId = $dataRow["UserId"];
            $this->CollegeId = $dataRow["CollegeId"];
            $this->Email = $dataRow["Email"];
            $this->ApiKey = $dataRow["ApiKey"];
            $this->FirstName = $dataRow["FirstName"];
            $this->LastName = $dataRow["LastName"];
            $this->UserCredits = $dataRow["UserCredits"];
            $this->Classification = $dataRow["Classification"];
            $this->GPA = $dataRow["GPA"];
        }
    }
}