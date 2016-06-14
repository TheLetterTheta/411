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
}