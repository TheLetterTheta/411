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
        return FUNCTIONS::queryAndMapArray($query, "UserService::MapToUser", $this->db);
    }

    function GetUserDetails($userId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_USER_VIEW);
        $query->bindParam(':userId', $userId);
        return FUNCTIONS::queryAndMapItem($query, 'UserService::MapToUserVM',  $this->db);
    }

    public function GetUserById($userId)
    {
        $query = $this->db->prepare(SqlPreparedStatements::GET_USER_BY_ID);
        $query->bindParam(':userId', $userId);
        return FUNCTIONS::queryAndMapItem($query, 'UserService::MapToUser', $this->db);
    }

    public static function MapToUser(array $row, PDO $db){
        return new User($row, $db);
    }

    public static function MapToUserVM(array $row, PDO $db){
        return new UserDTO($row);
    }
}