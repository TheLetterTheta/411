<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/12/2016
 * Time: 22:06 PM
 */
class ClassUserPrerequisites
{
    public $ClassUserPrerequisiteId;
    public $ClassId;
    public $Comparator;
    public $UserProperty;
    public $Value;

    function __construct(array $dataRow = null)
    {
        if($dataRow != null){
            $this->ClassUserPrerequisiteId = $dataRow["ClassUserPrerequisiteId"];
            $this->ClassId = $dataRow["ClassId"];
            $this->Comparator = $dataRow["Comparator"];
            $this->UserProperty = $dataRow["UserProperty"];
            $this->Value = $dataRow["Value"];
        }
    }
}