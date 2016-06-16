<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/15/2016
 * Time: 22:35 PM
 */
class FUNCTIONS
{
    public static function queryAndMapArray(PDOStatement $query, callable $mapFunction){
        $resultSet = [];
        if($query->execute()){
            foreach($query->fetchAll() as $row){
                array_push($resultSet, call_user_func($mapFunction, $row));
            }
        }
        return $resultSet;
    }

    public static function queryAndMapItem(PDOStatement $query, callable $mapFunction){
        if($query->execute()){
            return call_user_func($mapFunction, $query->fetch());
        }
        return null;
    }
}