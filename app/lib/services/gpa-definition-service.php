<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/21/2016
 * Time: 22:16 PM
 */
class GpaDefinitionService
{
    private $db;
    function __construct(PDO $dbInstance)
    {
        $this->db = $dbInstance;
    }

    function GetGpaDefinitionsByCollegeId($collegeId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_GPA_DEFINITIONS_BY_COLLEGE);
        $query->bindParam(":collegeId", $collegeId);
        return FUNCTIONS::queryAndMapArray($query, 'GpaDefinitionService::MapToGpaDefinition', $this->db);
    }

    public static function MapToGpaDefinition(array $row, PDO $db){
        return new CollegeGpaDefinition($row, $db);
    }
}