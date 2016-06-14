<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/13/2016
 * Time: 20:10 PM
 */
class CollegeClassService
{
    private $db;
    function __construct(PDO $dbInstance)
    {
        $this->db = $dbInstance;
    }

    function GetClassById($classId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_CLASS_BY_ID);
        $query->bindParam(":classId", $classId);
        if($query->execute()){
            return $this->MapToCollegeClass($query->fetch());
        }
        return null;
    }
    
    function GetClasses($collegeId){
        $classResults = [];
        $query = $this->db->prepare(SqlPreparedStatements::GET_ALL_CLASSES_BY_COLLEGE);
        $query->bindParam(":collegeId", $collegeId);
        if($query->execute()){
            foreach($query->fetchAll() as $row){
                array_push($classResults, $this->MapToCollegeClass($row));
            }
        }
        return $classResults;
    }

    public function GetClassPrerequisites($classId)
    {
        $classResults = [];
        $query = $this->db->prepare(SqlPreparedStatements::GET_CLASS_PREREQUISITES);
        $query->bindParam(":classId", $classId);
        if($query->execute()){
            foreach($query->fetchAll() as $row){
                array_push($classResults, $this->MapToCollegeClass($row));
            }
        }
        return $classResults;
    }

    function MapToCollegeClass(array $row){
        return new CollegeClass($row);
    }
}