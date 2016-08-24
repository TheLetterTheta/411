<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/12/2016
 * Time: 22:13 PM
 */
class Concentration
{
    #PUBLIC PROPERTIES
    public $ConcentrationId;
    public $CurriculumId;
    public $Name;

    #PRIVATE PROPERTIES
    private $db;

    #CONSTRUCTOR
    function __construct(array $dataRow = null, PDO $dbInstance = null)
    {
        $this->db = $dbInstance;
        if($dataRow != null){
            $this->ConcentrationId = $dataRow["ConcentrationId"];
            $this->CurriculumId = $dataRow["CurriculumId"];
            $this->Name = $dataRow["Name"];
        }
    }

    #RELATIONSHIP PROPERTIES
    private $curriculum;
    private $hasCurriculum = false;
    function GetCurriculum(){
        if($this->curriculum == null && ! $this->hasCurriculum){
            $curriculumService = new CurriculumService($this->db);
            $this->curriculum = $curriculumService->GetCurriculumById($this->CurriculumId);
            $this->hasCurriculum = true;
        }
        return $this->curriculum;
    }

    private $classes = [];
    private $hasClasses = false;
    function GetGpaDefinitions(){
        if(empty($this->classes) && ! $this->hasClasses){
            $classService = new CollegeClassService($this->db);
            $this->classes = $classService->GetClassesByConcentration($this->CurriculumId);
            $this->hasClasses = true;
        }
        return $this->classes;
    }


    private $userConcentrations = [];
    private $hasUserConcentration = false;
    function GetUserConcentrations(){
        if(empty($this->userConcentrations) && !  $this->hasUserConcentration){
            $userConcentrationService = new UserConcentrationService($this->db);
            $this->userConcentrations = $userConcentrationService->GetUserConcentrationsByConcentrationId($this->ConcentrationId);
            $this->hasUserConcentration = true;
        }
        return $this->userConcentrations;
    }
}