<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 5/31/2016
 * Time: 23:03 PM
 */

class UserService
{
    private $db;
    function __construct(PDO $dbInstance)
    {
        $this->db = $dbInstance;
    }

    function GetUsers(){
        $query = $this->db->query(SqlPreparedStatements::GET_ALL_USERS);
        return FUNCTIONS::queryAndMapArray($query, 'UserService::MapToUser');
    }

    function GetUserDetails($userId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_USER_VIEW);
        $query->bindParam(':userId', $userId);
        return FUNCTIONS::queryAndMapItem($query, 'UserService::MapToUserVM');
    }

    public function GetUserById($userId)
    {
        $query = $this->db->prepare(SqlPreparedStatements::GET_USER_BY_ID);
        $query->bindParam(':userId', $userId);
        return FUNCTIONS::queryAndMapItem($query, 'UserService::MapToUser');
    }

    private function MapToUser(array $row){
        return new User($row, $this->db);
    }

    private function MapToUserVM(array $row){
        return new UserDTO($row);
    }
}