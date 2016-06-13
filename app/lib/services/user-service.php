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
        $userResults = [];
        foreach($this->db->query(SqlPreparedStatements::GET_ALL_USERS) as $row){
            array_push($userResults, $this->MapToUser($row));
        }
        return $userResults;
    }

    function GetUserDetails($userId){
        $preparedSql = $this->db->prepare(SqlPreparedStatements::GET_USER_VIEW);
        $preparedSql->bindParam(':userId', $userId);
        if($preparedSql->execute()){
            if($row = $preparedSql->fetch()) {
                return $this->MapToUserVM($row);
            }
        }
        return null;
    }
    
    private function MapToUser(array $row){
        return new User($row);
    }

    private function MapToUserVM(array $row){
        return new UserDTO($row);
    }
}