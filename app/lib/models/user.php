<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/1/2016
 * Time: 22:18 PM
 */
class User
{
    #PUBLIC PROPERTIES
    public $UserId;
    public $CollegeId;
    public $Email;
    public $ApiKey;
    public $FirstName;
    public $LastName;

    #PRIVATE PROPERTIES
    private $db;

    #CONSTRUCTOR
    function __construct(array $dataRow = null, PDO $dbInstance = null)
    {
        $this->db = $dbInstance;

        if($dataRow != null){
            $this->UserId = $dataRow["UserId"];
            $this->CollegeId = $dataRow["CollegeId"];
            $this->Email = $dataRow["Email"];
            $this->ApiKey = $dataRow["ApiKey"];
            $this->FirstName = $dataRow["FirstName"];
            $this->LastName = $dataRow["LastName"];
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