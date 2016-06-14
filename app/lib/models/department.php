<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/12/2016
 * Time: 22:16 PM
 */
class Department
{
    #PUBLIC PROPERTIES
    public $DepartmentId;
    public $CollegeId;
    public $Name;

    #PRIVATE PROPERTIES
    private $db;

    #CONSTRUCTOR
    function __construct(array $dataRow = null, PDO $dbInstance = null)
    {
        $this->db = $dbInstance;
        if($dataRow != null){
            $this->DepartmentId = $dataRow["DepartmentId"];
            $this->CollegeId = $dataRow["CollegeId"];
            $this->Name = $dataRow["Name"];
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