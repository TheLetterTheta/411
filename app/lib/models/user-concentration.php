<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/12/2016
 * Time: 22:20 PM
 */
class UserConcentration
{
    #PUBLIC PROPERTIES
    public $ConcentrationId;
    public $UserId;
    public $StartDate;

    #PRIVATE PROPERTIES
    private $db;

    #CONSTRUCTOR
    function __construct(array $dataRow = null, PDO $dbInstance = null)
    {
        $this->db = $dbInstance;
        if($dataRow != null){
            $this->ConcentrationId = $dataRow["ConcentrationId"];
            $this->UserId = $dataRow["UserId"];
            $this->StartDate = $dataRow["StartDate"];
        }
    }

    #RELATIONSHIP PROPERTIES
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

    private $user;
    private $hasUser = false;
    function GetUser(){
        if($this->user == null && ! $this->hasConcentration){
            $userService = new UserService($this->db);
            $this->user = $userService->GetUserById($this->UserId);
            $this->hasUser = true;
        }
        return $this->user;
    }
}