<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/12/2016
 * Time: 22:13 PM
 */
class Concentration
{
    public $ConcentrationId;
    public $CurriculumId;
    public $Name;

    function __construct(array $dataRow = null)
    {
        if($dataRow != null){
            $this->ConcentrationId = $dataRow["ConcentrationId"];
            $this->CurriculumId = $dataRow["CurriculumId"];
            $this->Name = $dataRow["Name"];
        }
    }
}