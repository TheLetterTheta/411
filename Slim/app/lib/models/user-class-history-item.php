<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/12/2016
 * Time: 22:18 PM
 */
class UserClassHistoryItem
{
    #PUBLIC PROPERTIES
    public $ClassId;
    public $UserId;
    public $PercentGrade;
    public $Rating;
    public $Review;
    public $Status;
    public $TakenDate;

    #PRIVATE PROPERTIES
    private $db;

    #CONSTRUCTOR
    function __construct(array $dataRow = null, PDO $dbInstance = null)
    {
        $this->db = $dbInstance;
        if($dataRow != null){
            $this->ClassId = $dataRow["ClassId"];
            $this->UserId = $dataRow["UserId"];
            $this->PercentGrade = $dataRow["PercentGrade"];
            $this->Rating = $dataRow["Rating"];
            $this->Review = $dataRow["Review"];
            $this->Status = $dataRow["Status"];
            $this->TakenDate = $dataRow["TakenDate"];
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
    
    private $user;
    private $hasUser = false;
    function GetUser(){
        if($this->user == null && ! $this->hasUser){
            $userService = new UserService($this->db);
            $this->user = $userService->GetUserById($this->UserId);
            $this->hasUser = true;
        }
        return $this->user;
    }
}