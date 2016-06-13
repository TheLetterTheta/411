<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/12/2016
 * Time: 21:59 PM
 */
class CollegeClass
{
    public $ClassId;
    public $CollegeId;
    public $CreditHours;
    public $Name;
    public $ShortName;

    function __construct(array $dataRow = null)
    {
        if($dataRow != null){
            $this->ClassId = $dataRow["ClassId"];
            $this->CollegeId = $dataRow["CollegeId"];
            $this->CreditHours = $dataRow["CreditHours"];
            $this->Name = $dataRow["Name"];
            $this->ShortName = $dataRow["ShortName"];
        }
    }
}