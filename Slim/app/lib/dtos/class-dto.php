<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/14/2016
 * Time: 23:48 PM
 */
class ClassDTO
{
    #PUBLIC PROPERTIES
    public $ClassId;
    public $CollegeId;
    public $CreditHours;
    public $Name;
    public $ShortName;
    public $AverageUserRating;
    public $AverageUserGrade;
    public $TotalTimesTaken;

    function __construct(array $row = null)
    {
        if($row != null){
            $this->ClassId = $row["ClassId"];
            $this->CollegeId = $row["CollegeId"];
            $this->CreditHours = $row["CreditHours"];
            $this->Name = $row["Name"];
            $this->ShortName = $row["ShortName"];
            $this->AverageUserRating = $row["AverageUserRating"];
            $this->AverageUserGrade = $row["AverageUserGrade"];
            $this->TotalTimesTaken = $row["TotalTimesTaken"];
        }
    }
}