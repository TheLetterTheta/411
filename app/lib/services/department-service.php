<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/13/2016
 * Time: 22:26 PM
 */
class DepartmentService
{
    private $db;
    function __construct(PDO $dbInstance)
    {
        $this->db = $dbInstance;
    }

    function GetDepartments(){
        $departmentResults = [];
        foreach($this->db->query(SqlPreparedStatements::GET_ALL_DEPARTMENTS) as $row){
            array_push($departmentResults, $this->MapToCurriculum($row));
        }
        return $departmentResults;
    }

    function GetDepartmentById($departmentId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_DEPARTMENT_BY_ID);
        $query->bindParam(":departmentId", $departmentId);
        if($query->execute()){
            return $this->MapToCurriculum($query->fetch());
        }
        return null;
    }

    function MapToCurriculum(array $row){
        return new Department($row, $this->db);
    }
}