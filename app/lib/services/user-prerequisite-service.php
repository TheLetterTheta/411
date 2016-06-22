<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/21/2016
 * Time: 21:13 PM
 */
class UserPrerequisiteService
{
    private $db;
    function __construct(PDO $dbInstance)
    {
        $this->db = $dbInstance;
    }
    
    function GetClassUserPrerequisites($classId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_USER_PREREQUISITES_BY_CLASS);
        $query->bindParam(":classId", $classId);
        return FUNCTIONS::queryAndMapArray($query, 'UserPrerequisiteService::MapToUserPrerequisite');
    }
    
    function MapToUserPrerequisite(array $row){
        return new ClassUserPrerequisite($row, $this->db);
    }
}