<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/12/2016
 * Time: 22:10 PM
 */
class College
{
    #PUBLIC PROPERTIES
    public $CollegeId;
    public $Name;

    #PRIVATE PROPERTIES
    private $db;

    #CONSTRUCTOR
    function __construct(array $dataRow = null, PDO $dbInstance = null)
    {
        $this->db = $dbInstance;
        if($dataRow != null){
            $this->CollegeId = $dataRow["CollegeId"];
            $this->Name = $dataRow["Name"];
        }
    }

    #RELATIONSHIP PROPERTIES
    private $classifications = [];
    private $hasClassifications = false;
    function GetClassifications(){
        if(empty($this->classifications) && ! $this->hasClassifications){
            $classificationService = new ClassificationService($this->db);
            $this->classifications = $classificationService->GetClassificationsByCollege($this->CollegeId);
            $this->hasClassifications = true;
        }
        return $this->classifications;
    }

    private $classes = [];
    private $hasClasses = false;
    function GetClasses(){
        if(empty($this->classes) && ! $this->hasClasses){
            $classService = new CollegeClassService($this->db);
            $this->classes = $classService->GetClassesByCollegeId($this->CollegeId);
            $this->hasClasses = true;
        }
        return $this->classes;
    }
    
    private $gpaDefinitions = [];
    private $hasGpaDefinitions = false;
    function GetGpaDefinitions(){
        if(empty($this->gpaDefinitions) && ! $this->hasGpaDefinitions){
            $classService = new CollegeClassService($this->db);
            $this->gpaDefinitions = $classService->GetClassesByCollegeId($this->CollegeId);
            $this->hasGpaDefinitions = true;
        }
        return $this->gpaDefinitions;
    }

    private $departments = [];
    private $hasDepartments = false;
    function GetDepartments(){
        if(empty($this->departments) && ! $this->hasDepartments){
            $departmentService = new DepartmentService($this->db);
            $this->departments = $departmentService->GetDepartmentsByCollege($this->CollegeId);
            $this->hasDepartments = true;
        }
        return $this->departments;
    }
}