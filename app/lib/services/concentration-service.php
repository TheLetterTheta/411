<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/13/2016
 * Time: 22:20 PM
 */
class ConcentrationService
{
    private $db;
    function __construct(PDO $dbInstance)
    {
        $this->db = $dbInstance;
    }

    function GetConcentrations(){
        $query = $this->db->query(SqlPreparedStatements::GET_ALL_CONCENTRATIONS);
        return FUNCTIONS::queryAndMapArray($query, 'ConcentrationService::MapToConcentration', $this->db);
    }

    function GetConcentrationById($concentrationId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_CONCENTRATION_BY_ID);
        $query->bindParam(":concentrationId", $concentrationId);
        return FUNCTIONS::queryAndMapItem($query, 'ConcentrationService::MapToConcentration', $this->db);
    }

    function GetConcentrationsByCurriculum($curriculumId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_CONCENTRATIONS_BY_CURRICULUM);
        $query->bindParam(":curriculumId", $curriculumId);
        return FUNCTIONS::queryAndMapArray($query, 'ConcentrationService::MapToConcentration', $this->db);
    }
    
    public static function MapToConcentration(array $row, PDO $db){
        return new Concentration($row, $db);
    }
}