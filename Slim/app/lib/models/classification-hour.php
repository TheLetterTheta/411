<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/12/2016
 * Time: 22:01 PM
 */
class ClassificationHour
{
    #PUBLIC PROPERTIES
    public $ClassificationHoursId;
    public $CollegeId;
    public $Hours;
    public $Classification;

    #PRIVATE PROPERTIES
    private $db;

    #CONSTRUCTOR
    function __construct(array $dataRow = null, PDO $dbInstance = null)
    {
        $this->db = $dbInstance;
        if($dataRow != null){
            $this->ClassificationHoursId = $dataRow["ClassificationHoursId"];
            $this->CollegeId = $dataRow["CollegeId"];
            $this->Hours = $dataRow["Hours"];
            $this->Classification = $dataRow["Classification"];
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