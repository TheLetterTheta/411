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

    function PostUser($user){
        $query =$this->db->prepare(SqlPreparedStatements::INSERT_USERS);
        $query->bindParam(':collegeId',$user->CollegeId);
        $query->bindParam(':email',$user->Email);
        $query->bindParam(':apiKey',$user->ApiKey);
        $query->bindParam(':firstName',$user->FirstName);
        $query->bindParam(':lastName',$user->LastName);
        return $query->execute();
        
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