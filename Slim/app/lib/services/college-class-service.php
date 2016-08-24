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
        $query = $this->db->prepare(SqlPreparedStatements::GET_CLASS_VIEW);
        $query->bindParam(":classId", $classId);
        return FUNCTIONS::queryAndMapItem($query, 'CollegeClassService::MapToClassDTO', $this->db);
    }
    
    function GetClassesByCollegeId($collegeId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_ALL_CLASSES_BY_COLLEGE);
        $query->bindParam(":collegeId", $collegeId);
        return FUNCTIONS::queryAndMapArray($query, 'CollegeClassService::MapToCollegeClass', $this->db);
    }

    function GetClassPrerequisites($classId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_CLASS_PREREQUISITES);
        $query->bindParam(":classId", $classId);
        return FUNCTIONS::queryAndMapArray($query, 'CollegeClassService::MapToCollegeClass', $this->db);
    }

    function GetClassesByConcentration($curriculumId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_CLASSES_BY_CURRICULUM);
        $query->bindParam(":curriculumId", $curriculumId);
        return FUNCTIONS::queryAndMapArray($query, 'CollegeClassService::MapToCollegeClass', $this->db);
    }

    function MapToCollegeClass(array $row, PDO $db){
        return new CollegeClass($row, $db);
    }

    function MapToClassDTO(array $row, PDO $db){
        return new ClassDTO($row);
    }
}