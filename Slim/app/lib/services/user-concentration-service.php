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
        return FUNCTIONS::queryAndMapArray($query, 'UserConcentrationService::MapToUserConcentration', $this->db);
    }

    function GetUserConcentrationsByUserId($userId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_USER_CONCENTRATION_BY_USER);
        $query->bindParam(":userId", $userId);
        return FUNCTIONS::queryAndMapArray($query, 'UserConcentrationService::MapToUserConcentration', $this->db);
    }

    function GetUserConcentrationsByConcentrationId($concentrationId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_USER_CONCENTRATION_BY_CONCENTRATION);
        $query->bindParam(":concentrationId", $concentrationId);
        return FUNCTIONS::queryAndMapArray($query, 'UserConcentrationService::MapToUserConcentration', $this->db);
    }

    public static function MapToUserConcentration(array $row, PDO $db){
        return new UserConcentration($row, $db);
    }
}