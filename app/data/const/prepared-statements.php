<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 5/31/2016
 * Time: 22:56 PM
 */

class SqlPreparedStatements{

    #USERS
    const INSERT_USERS = "INSERT INTO users 
                                (`CollegeId`
                                , `Email`
                                , `ApiKey`
                                , `FirstName`
                                , `LastName`) 
                          VALUES 
                                (:collegeId
                                , :email
                                , :apiKey
                                , :firstName
                                , :lastName);";

    const GET_ALL_USERS = "SELECT u.UserId
                                , u.CollegeId
                                , u.Email
                                , u.ApiKey
                                , u.FirstName
                                , u.LastName
                          FROM users AS u;";

    const GET_USER_BY_ID = "SELECT u.UserId
                                , u.CollegeId
                                , u.Email
                                , u.ApiKey
                                , u.FirstName
                                , u.LastName
                          FROM users AS u
                          WHERE `UserId` = :userId 
                          LIMIT 1;";

    const GET_USER_VIEW = "SELECT u.UserId
                                , u.CollegeId
                                , u.ApiKey
                                , u.Email
                                , u.FirstName
                                , u.LastName
                                , u.UserCredits
                                , u.Classification
                                , u.GPA
                          FROM vew_users AS u 
                          WHERE u.UserId = :userId 
                          LIMIT 1;";

    #CLASSES
    const INSERT_CLASS = "INSERT INTO classes (CollegeId
                                              , CreditHours
                                              , ShortName
                                              , Name) 
                                  VALUES (:collegeId
                                          , :creditHours
                                          , :shortName
                                          ,:name);";

    const GET_ALL_CLASSES_BY_COLLEGE = "SELECT c.ClassId
                                          , c.CollegeId
                                          , c.CreditHours
                                          , c.ShortName
                                          , c.Name
                                        FROM classes AS c
                                        WHERE c.CollegeId = :collegeId";

    const GET_CLASS_BY_ID = "SELECT c.ClassId
                                  , c.CollegeId
                                  , c.CreditHours
                                  , c.ShortName
                                  , c.Name
                            FROM classes AS c
                            WHERE c.ClassId = :classId 
                            LIMIT 1;";

    const GET_CLASS_VIEW = "SELECT c.ClassId
                                  , c.CollegeId
                                  , c.CreditHours
                                  , c.ShortName
                                  , c.Name
                                  , c.AverageUserGrade
                                  , c.AverageUserRating
                                  , c.TotalTimesTaken
                            FROM vew_classes AS c
                            WHERE c.ClassId = :classId 
                            LIMIT 1;";
    
    const GET_CLASS_PREREQUISITES = "SELECT c.ClassId
                                              , c.CollegeId
                                              , c.CreditHours
                                              , c.ShortName
                                              , c.Name
                                        FROM classes AS c
                                        WHERE c.ClassId IN 
                                          (SELECT PrevClassId 
                                          FROM classprerequisites AS cp
                                          WHERE cp.ClassId = :classId);";

    #COLLEGES
    const GET_ALL_COLLEGES = "SELECT c.CollegeId
                                    , c.Name
                              FROM colleges AS c;";

    const GET_COLLEGE_BY_ID = "SELECT c.CollegeId
                                    , c.Name
                                FROM colleges AS c
                                WHERE c.CollegeId = :collegeId LIMIT 1;";

    #CURRICULA
    const GET_ALL_CURRICULA = "SELECT c.CurriculumId
                                      , c.DepartmentId
                                      , c.EffectiveDate
                                      , c.ExpirationDate
                                      , c.Name
                                FROM curricula AS c;";

    const GET_CURRICULUM_BY_ID = "SELECT c.CurriculumId
                                      , c.DepartmentId
                                      , c.EffectiveDate
                                      , c.ExpirationDate
                                      , c.Name
                                FROM curricula AS c 
                                WHERE c.CurriculumId = :curriculumId 
                                LIMIT 1;";

    #CONCENTRATIONS
    const GET_ALL_CONCENTRATIONS = "SELECT c.ConcentrationId
                                          , c.CurriculumId
                                    FROM concentrations AS c;";

    const GET_CONCENTRATION_BY_ID = "SELECT c.ConcentrationId
                                          , c.CurriculumId
                                    FROM concentrations AS c
                                    WHERE c.ConcentrationID = :concentrationId 
                                    LIMIT 1;";

    #DEPARTMENTS
    const GET_ALL_DEPARTMENTS = "SELECT d.DepartmentId
                                        , d.CollegeId
                                        , d.CollegeId
                                  FROM departments AS d;";

    const GET_DEPARTMENT_BY_ID = "SELECT d.DepartmentId
                                        , d.CollegeId
                                        , d.CollegeId
                                  FROM departments AS d
                                  WHERE d.DepartmentId = :departmentId 
                                  LIMIT 1;";
}