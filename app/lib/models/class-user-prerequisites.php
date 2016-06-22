<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/12/2016
 * Time: 22:06 PM
 */
class ClassUserPrerequisite
{
    #PUBLIC PROPERTIES
    public $ClassUserPrerequisiteId;
    public $ClassId;
    public $Comparator;
    public $UserProperty;
    public $Value;

    #PRIVATE PROPERTIES
    private $db;

    #CONSTRUCTOR
    function __construct(array $dataRow = null, PDO $dbInstance = null)
    {
        $this->db = $dbInstance;
        if($dataRow != null){
            $this->ClassUserPrerequisiteId = $dataRow["ClassUserPrerequisiteId"];
            $this->ClassId = $dataRow["ClassId"];
            $this->Comparator = $dataRow["Comparator"];
            $this->UserProperty = $dataRow["UserProperty"];
            $this->Value = $dataRow["Value"];
        }
    }

    #RELATIONSHIP PROPERTIES
    private $class;
    private $hasClass = false;
    public function GetClass(){
        if($this->class == null && ! $this->hasClass){
            $collegeClassService = new CollegeClassService($this->db);
            $this->class = $collegeClassService->GetClassById($this->ClassId);
            $this->hasClass = true;
        }
        return $this->class;
    }
}