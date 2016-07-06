<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/21/2016
 * Time: 22:05 PM
 */
class ClassificationService
{
    private $db;
    function __construct(PDO $dbInstance)
    {
        $this->db = $dbInstance;
    }

    function GetClassificationsByCollege($collegeId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_CLASSIFICATIONS_BY_COLLEGE);
        $query->bindParam(":collegeId", $collegeId);
        return FUNCTIONS::queryAndMapArray($query, 'ClassificationService::MapToClassification', $this->db);
    }

    public static function MapToClassification(array $row, PDO $db){
        return new ClassificationHour($row, $db);
    }
}