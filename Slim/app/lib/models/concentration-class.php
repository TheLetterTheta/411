<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/12/2016
 * Time: 22:11 PM
 */
class ConcentrationClass
{
    #PUBLIC PROPERTIES
    public $ClassId;
    public $ConcentrationId;

    #PRIVATE PROPERTIES
    private $db;

    #CONSTRUCTOR
    function __construct(array $dataRow = null, PDO $dbInstance = null)
    {
        $this->db = $dbInstance;
        if($dataRow != null){
            $this->ClassId = $dataRow["ClassId"];
            $this->ConcentrationId = $dataRow["ConcentrationId"];
        }
    }

    #RELATIONSHIP PROPERTIES
    private $class;
    private $hasClass = false;
    function GetClass(){
        if($this->class == null && ! $this->hasClass){
            $classService = new CollegeClassService($this->db);
            $this->class = $classService->GetClassById($this->ClassId);
            $this->hasClass = true;
        }
        return $this->class;
    }

    private $concentration;
    private $hasConcentration = false;
    function GetConcentration(){
        if($this->concentration == null && ! $this->hasConcentration){
            $concentrationService = new ConcentrationService($this->db);
            $this->concentration = $concentrationService->GetConcentrationById($this->ConcentrationId);
            $this->hasConcentration = true;
        }
        return $this->concentration;
    }
}