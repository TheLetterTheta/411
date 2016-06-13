<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/12/2016
 * Time: 22:14 PM
 */
class Curriculum
{
    public $CurriculumId;
    public $DepartmentId;
    public $EffectiveDate;
    public $ExpirationDate;
    public $Name;

    function __construct(array $dataRow = null)
    {
        if($dataRow != null){
            $this->CurriculumId = $dataRow["CurriculumId"];
            $this->DepartmentId = $dataRow["DepartmentId"];
            $this->EffectiveDate = $dataRow["EffectiveDate"];
            $this->ExpirationDate = $dataRow["ExpirationDate"];
            $this->Name = $dataRow["Name"];
        }
    }
}