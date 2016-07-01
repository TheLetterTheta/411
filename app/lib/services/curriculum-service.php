<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/13/2016
 * Time: 22:06 PM
 */
class CurriculumService
{
    private $db;
    function __construct(PDO $dbInstance)
    {
        $this->db = $dbInstance;
    }
    
    function GetCurricula(){
        $query = $this->db->query(SqlPreparedStatements::GET_ALL_CURRICULA);
        return FUNCTIONS::queryAndMapArray($query, 'CurriculumService::MapToCurriculum', $this->db);
    }

    function GetCurriculumById($curriculumId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_CURRICULUM_BY_ID);
        $query->bindParam(":curriculumId", $curriculumId);
        return FUNCTIONS::queryAndMapItem($query, 'CurriculumService::MapToCurriculum', $this->db);
    }

    function GetCurriculaByDepartment($departmentId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_CURRICULA_BY_DEPARTMENT);
        $query->bindParam(":departmentId", $departmentId);
        return FUNCTIONS::queryAndMapItem($query, 'CurriculumService::MapToCurriculum', $this->db);
    }

    public static function MapToCurriculum(array $row, PDO $db){
        return new Curriculum($row, $db);
    }
}