<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/12/2016
 * Time: 22:10 PM
 */
class College
{
    public $CollegeId;
    public $Name;

    function __construct(array $dataRow = null)
    {
        if($dataRow != null){
            $this->CollegeId = $dataRow["CollegeId"];
            $this->Name = $dataRow["Name"];
        }
    }
}