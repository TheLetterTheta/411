<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/12/2016
 * Time: 22:08 PM
 */
class CollegeGpaDefinition
{
    #PUBLIC PROPERTIES
    public $CollegeGpaDefinitionId;
    public $CollegeId;
    public $GpaDefinition;
    public $LetterDefinition;
    public $PercentGrade;

    #PRIVATE PROPERTIES
    private $db;

    #CONSTRUCTOR
    function __construct(array $dataRow = null, PDO $dbInstance = null)
    {
        $this->db = $dbInstance;
        if($dataRow != null){
            $this->CollegeGpaDefinitionId = $dataRow["CollegeGpaDefinitionId"];
            $this->CollegeId = $dataRow["CollegeId"];
            $this->GpaDefinition = $dataRow["GpaDefinition"];
            $this->LetterDefinition = $dataRow["LetterDefinition"];
            $this->PercentGrade = $dataRow["PercentGrade"];
        }
    }

    #RELATIONSHIP PROPERTIES
    private $college;
    private $hasCollege = false;
    function GetCollege(){
        if($this->college == null && ! $this->hasCollege){
            $collegeService = new CollegeService($this->db);
            $this->college = $collegeService->GetCollegeById($this->CollegeId);
            $this->hasCollege = true;
        }
        return $this->college;
    }
}