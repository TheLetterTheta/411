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
        $query = $this->db->query(SqlPreparedStatements::GET_ALL_DEPARTMENTS);
        return FUNCTIONS::queryAndMapArray($query, 'DepartmentService::MapToDepartment', $this->db);
    }

    function GetDepartmentById($departmentId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_DEPARTMENT_BY_ID);
        $query->bindParam(":departmentId", $departmentId);
        return FUNCTIONS::queryAndMapItem($query, 'DepartmentService::MapToDepartment', $this->db);
    }

    function GetDepartmentsByCollege($collegeId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_DEPARTMENTS_BY_COLLEGE);
        $query->bindParam(":collegeId", $collegeId);
        return FUNCTIONS::queryAndMapItem($query, 'DepartmentService::MapToDepartment', $this->db);
    }

    public static function MapToDepartment(array $row, PDO $db){
        return new Department($row, $db);
    }
}