<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/12/2016
 * Time: 22:16 PM
 */
class Department
{
    public $DepartmentId;
    public $CollegeId;
    public $Name;

    function __construct(array $dataRow = null)
    {
        if($dataRow != null){
            $this->DepartmentId = $dataRow["DepartmentId"];
            $this->CollegeId = $dataRow["CollegeId"];
            $this->Name = $dataRow["Name"];
        }
    }
}