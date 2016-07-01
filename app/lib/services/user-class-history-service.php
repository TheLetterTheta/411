<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/21/2016
 * Time: 23:02 PM
 */
class UserClassHistoryService
{
    private $db;
    function __construct(PDO $dbInstance)
    {
        $this->db = $dbInstance;
    }

    function GetClassHistoryByUserId($userId){
        $query = $this->db->prepare(SqlPreparedStatements::GET_USER_CLASS_HISTORY_BY_USER);
        $query->bindParam(":userId", $userId);
        return FUNCTIONS::queryAndMapArray($query, 'UserClassHistoryService::MapToUserClassHistoryItem', $this->db);
    }

    public static function MapToUserClassHistoryItem(array $row, PDO $db){
        return new UserClassHistoryItem($row, $db);
    }
}