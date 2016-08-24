<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/12/2016
 * Time: 22:04 PM
 */
class ClassPrerequisite
{
    #PUBLIC PROPERTIES
    public $ClassId;
    public $PrevClassId;

    #PRIVATE PROPERTIES
    private $db;

    #CONSTRUCTOR
    function __construct(array $dataRow = null, PDO $dbInstance = null)
    {
        $this->db = $dbInstance;

        $this->prevClass = new CollegeClass();
        
        if($dataRow != null){
            $this->ClassId = $dataRow["ClassId"];
            $this->PrevClassId = $dataRow["PrevClassId"];
        }
    }

    #RELATIONSHIP PROPERTIES
    private $class;
    private $hasClass = false;
    public function GetClass(){
        if($this->class != null)
            return $this->class;
        if(! $this->hasClass){
            $collegeClassService = new CollegeClassService($this->db);
            $this->class = $collegeClassService->GetClassById($this->ClassId);
            $this->hasClass = true;
        }
        return $this->class;
    }
    public function SetClass($newClass){
        $this->class = $newClass;
        $this->hasClass = true;
    }

    private $prevClass;
    private $hasPrevClass = false;
    public function GetPrevClass(){
        if($this->prevClass != null && ! $this->hasPrevClass){
            $collegeClassService = new CollegeClassService($this->db);
            $this->prevClass = $collegeClassService->GetClassById($this->PrevClassId);
            $this->hasPrevClass = true;
        }
        return $this->prevClass;
    }
    public function SetPrevClass($newPrevClass){
        $this->prevClass = $newPrevClass;
        $this->hasPrevClass = true;
    }
}