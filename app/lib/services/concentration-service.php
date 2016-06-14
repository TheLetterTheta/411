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
        $concentrationResults = [];
        foreach($this->db->query(SqlPreparedStatements::GET_ALL_CONCENTRATIONS) as $row) {
            array_push($concentrationResults, $this->MapToConcentration($row));
        }
        return $concentrationResults;
    }

    function GetConcentrationById($concentrationId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_CONCENTRATION_BY_ID);
        $query->bindParam(":concentrationId", $concentrationId);
        if($query->execute()){
            return $this->MapToConcentration($query->fetch());
        }
        return null;
    }

    function MapToConcentration(array $row){
        return new Concentration($row, $this->db);
    }
}