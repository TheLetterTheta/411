<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/1/2016
 * Time: 22:18 PM
 */
class User
{
    public $UserId;
    public $CollegeId;
    public $Email;
    public $ApiKey;
    public $FirstName;
    public $LastName;

    function __construct(array $dataRow = null)
    {
        if($dataRow != null){
            $this->UserId = $dataRow["UserId"];
            $this->CollegeId = $dataRow["CollegeId"];
            $this->Email = $dataRow["Email"];
            $this->ApiKey = $dataRow["ApiKey"];
            $this->FirstName = $dataRow["FirstName"];
            $this->LastName = $dataRow["LastName"];
        }
    }
}