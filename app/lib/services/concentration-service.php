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
        return FUNCTIONS::queryAndMapArray($query, 'ConcentrationService::MapToConcentration');
    }

    function GetConcentrationById($concentrationId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_CONCENTRATION_BY_ID);
        $query->bindParam(":concentrationId", $concentrationId);
        return FUNCTIONS::queryAndMapItem($query, 'ConcentrationService::MapToConcentration');
    }

    function MapToConcentration(array $row){
        return new Concentration($row, $this->db);
    }
}