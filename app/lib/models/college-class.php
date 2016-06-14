<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/12/2016
 * Time: 21:59 PM
 */
class CollegeClass
{
    #PUBLIC PROPERTIES
    public $ClassId;
    public $CollegeId;
    public $CreditHours;
    public $Name;
    public $ShortName;

    #PRIVATE PROPERTIES
    private $db;

    #CONSTRUCTOR
    function __construct(array $dataRow = null, PDO $dbInstance = null)
    {
        $this->db = $dbInstance;
        if($dataRow != null){
            $this->ClassId = $dataRow["ClassId"];
            $this->CollegeId = $dataRow["CollegeId"];
            $this->CreditHours = $dataRow["CreditHours"];
            $this->Name = $dataRow["Name"];
            $this->ShortName = $dataRow["ShortName"];
        }
    }

    #RELATIONSHIP PROPERTIES
    private $class;
    private $hasClass = false;
    function GetClass(){
        if($this->class == null && ! $this->hasClass){
            $classService = new CollegeClassService($this->db);
            $this->class= $classService->GetClassById($this->ClassId);
            $this->hasClass = true;
        }
        return $this->class;
    }

    private $classPrerequisites = [];
    private $hasClassPrerequisites = false;
    function GetClassPrerequisites(){
        if(empty($this->classPrerequisites) && ! $this->hasClassPrerequisites){
            $classService = new CollegeClassService($this->db);
            $this->classPrerequisites = $classService->GetClassPrerequisites($this->ClassId);
            $this->hasClassPrerequisites = true;
        }
        return $this->classPrerequisites;
    }
}