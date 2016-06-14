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
        $curriculaResults = [];
        foreach($this->db->query(SqlPreparedStatements::GET_ALL_CURRICULA) as $row){
            array_push($curriculaResults, $this->MapToCurriculum($row));
        }
        return $curriculaResults;
    }

    function GetCurriculumById($curriculumId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_CURRICULUM_BY_ID);
        $query->bindParam(":curriculumId", $curriculumId);
        if($query->execute()){
            return $this->MapToCurriculum($query->fetch());
        }
        return null;
    }

    function MapToCurriculum(array $row){
        return new Curriculum($row, $this->db);
    }
}