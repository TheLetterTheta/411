<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/12/2016
 * Time: 22:08 PM
 */
class CollegeGpaDefinition
{
    public $CollegeGpaDefinitionId;
    public $CollegeId;
    public $GpaDefinition;
    public $LetterDefinition;
    public $PercentGrade;

    function __construct(array $dataRow = null)
    {
        if($dataRow != null){
            $this->CollegeGpaDefinitionId = $dataRow["CollegeGpaDefinitionId"];
            $this->CollegeId = $dataRow["CollegeId"];
            $this->GpaDefinition = $dataRow["GpaDefinition"];
            $this->LetterDefinition = $dataRow["LetterDefinition"];
            $this->PercentGrade = $dataRow["PercentGrade"];
        }
    }
}