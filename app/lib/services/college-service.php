<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/13/2016
 * Time: 21:47 PM
 */
class CollegeService
{
    private $db;
    function __construct(PDO $dbInstance)
    {
        $this->db = $dbInstance;
    }

    function GetColleges(){
        $query = $this->db->query(SqlPreparedStatements::GET_ALL_COLLEGES);
        return FUNCTIONS::queryAndMapArray($query, 'CollegeService::MapToCollege', $this->db);
    }
    
    function GetCollegeById($collegeId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_COLLEGE_BY_ID);
        $query->bindParam(":collegeId", $collegeId);
        return FUNCTIONS::queryAndMapItem($query, 'CollegeService::MapToCollege', $this->db);
    }

    public static function MapToCollege(array $row, PDO $db){
        return new College($row, $db);
    }
}