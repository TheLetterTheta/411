<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/12/2016
 * Time: 22:01 PM
 */
class ClassificationHour
{
    public $ClassificationHoursId;
    public $CollegeId;
    public $Hours;
    public $Classification;

    function __construct(array $dataRow = null)
    {
        if($dataRow != null){
            $this->ClassificationHoursId = $dataRow["ClassificationHoursId"];
            $this->CollegeId = $dataRow["CollegeId"];
            $this->Hours = $dataRow["Hours"];
            $this->Classification = $dataRow["Classification"];
        }
    }
}