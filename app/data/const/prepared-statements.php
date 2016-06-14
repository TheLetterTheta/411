<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 5/31/2016
 * Time: 22:56 PM
 */

class SqlPreparedStatements{

    #USERS
    const INSERT_USERS = "INSERT INTO users (`CollegeId`, `Email`, `ApiKey`, `FirstName`, `LastName`) VALUES (:collegeId, :email, :apiKey, :firstName, :lastName);";
    const GET_ALL_USERS = "SELECT * FROM users;";
    const GET_USER_BY_ID = "SELECT * FROM users WHERE `UserId` = :userId LIMIT 1;";
    const GET_USER_VIEW = "SELECT * FROM vew_users WHERE `UserId` = :userId LIMIT 1;";

    #CLASSES
    const INSERT_CLASS = "INSERT INTO classes (CollegeId, CreditHours, ShortName, Name) VALUES (:collegeId, :creditHours, :shortName,:name)";
    const GET_ALL_CLASSES_BY_COLLEGE = "SELECT  * FROM classes WHERE CollegeId = :collegeId";
    const GET_CLASS_BY_ID = "SELECT * FROM classes WHERE ClassId = :classId LIMIT 1";
    const GET_CLASS_PREREQUISITES = "SELECT * FROM classes WHERE ClassId IN (SELECT PrevClassId FROM classprerequisites WHERE ClassId = :classId);";

    #COLLEGES
    const GET_ALL_COLLEGES = "SELECT * FROM colleges;";
    const GET_COLLEGE_BY_ID = "SELECT * FROM colleges WHERE CollegeId = :collegeId LIMIT 1";

    #CURRICULA
    const GET_ALL_CURRICULA = "SELECT * FROM curricula;";
    const GET_CURRICULUM_BY_ID = "SELECT * FROM curricula WHERE CurriculumId = :curriculumId LIMIT 1;";

    #CONCENTRATIONS
    const GET_ALL_CONCENTRATIONS = "SELECT * FROM concentrations;";
    const GET_CONCENTRATION_BY_ID = "SELECT * FROM concentrations WHERE ConcentrationID = :concentrationId LIMIT 1;";

    #DEPARTMENTS
    const GET_ALL_DEPARTMENTS = "SELECT * FROM departments;";
    const GET_DEPARTMENT_BY_ID = "SELECT * FROM departments WHERE DepartmentId = :departmentId LIMIT 1;";
}