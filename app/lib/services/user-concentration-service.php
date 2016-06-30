<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/29/2016
 * Time: 21:07 PM
 */
class UserConcentrationService
{
    private $db;
    function __construct(PDO $dbInstance)
    {
        $this->db = $dbInstance;
    }

    function GetUserConcentrations(){
        $query = $this->db->query(SqlPreparedStatements::GET_ALL_USER_CONCENTRATION);
        return FUNCTIONS::queryAndMapArray($query, 'UserConcentrationService::MapToUserConcentration');
    }

    function GetUserConcentrationsByUserId($userId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_USER_CONCENTRATION_BY_USER);
        $query->bindParam(":userId", $userId);
        return FUNCTIONS::queryAndMapArray($query, 'UserConcentrationService::MapToUserConcentration');
    }

    function GetUserConcentrationsByConcentrationId($concentrationId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_USER_CONCENTRATION_BY_CONCENTRATION);
        $query->bindParam(":concentrationId", $concentrationId);
        return FUNCTIONS::queryAndMapArray($query, 'UserConcentrationService::MapToUserConcentration');
    }

    function MapToUserConcentration(array $row){
        return new UserConcentration($row, $this->db);
    }
}