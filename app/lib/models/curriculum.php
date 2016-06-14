<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/12/2016
 * Time: 22:14 PM
 */
class Curriculum
{
    #PUBLIC PROPERTIES
    public $CurriculumId;
    public $DepartmentId;
    public $EffectiveDate;
    public $ExpirationDate;
    public $Name;

    #PRIVATE PROPERTIES
    private $db;

    #CONSTRUCTOR
    function __construct(array $dataRow = null, PDO $dbInstance = null)
    {
        $this->db = $dbInstance;
        if($dataRow != null){
            $this->CurriculumId = $dataRow["CurriculumId"];
            $this->DepartmentId = $dataRow["DepartmentId"];
            $this->EffectiveDate = $dataRow["EffectiveDate"];
            $this->ExpirationDate = $dataRow["ExpirationDate"];
            $this->Name = $dataRow["Name"];
        }
    }

    #RELATIONSHIP PROPERTIES
    private $department;
    private $hasDepartment = false;
    function GetDepartment(){
        if($this->department && ! $this->hasDepartment){
            $departmentService = new DepartmentService($this->db);
            $this->department = $departmentService->GetDepartmentById($this->DepartmentId);
            $this->hasDepartment = true;
        }
        return $this->department;
    }
}