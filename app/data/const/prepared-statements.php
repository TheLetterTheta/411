<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 5/31/2016
 * Time: 22:56 PM
 */

class SqlPreparedStatements{
    const INSERT_USERS = "INSERT INTO users (CollegeId, Email, ApiKey, FirstName, LastName) VALUES (:collegeId, :email, :apiKey, :firstName, :lastName);";
    const GET_ALL_USERS = "SELECT * FROM users;";

    const GET_USER_VIEW = "SELECT * FROM vew_users WHERE `UserId` = :userId;";
}