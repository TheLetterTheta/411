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
        $collegeResults = [];
        foreach($this->db->query(SqlPreparedStatements::GET_ALL_COLLEGES) as $row){
            array_push($collegeResults, $this->MapToCollege($row));
        }
        return $collegeResults;
    }
    
    function GetCollegeById($collegeId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_COLLEGE_BY_ID);
        $query->bindParam(":collegeId", $collegeId);
        if($query->execute()){
            return $this->MapToCollege($query->fetch());
        }
        return null;
    }

    function MapToCollege(array $row){
        return new College($row, $this->db);
    }
}