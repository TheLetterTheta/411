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

    const GET_ALL_USERS = "SELECT usr.UserId
                                , usr.CollegeId
                                , usr.Email
                                , usr.ApiKey
                                , usr.FirstName
                                , usr.LastName
                          FROM users AS usr;";

    const GET_USER_BY_ID = "SELECT usr.UserId
                                , usr.CollegeId
                                , usr.Email
                                , usr.ApiKey
                                , usr.FirstName
                                , usr.LastName
                          FROM users AS usr
                          WHERE usr.UserId = :userId 
                          LIMIT 1;";

    const GET_USER_VIEW = "SELECT vus.UserId
                                , vus.CollegeId
                                , vus.ApiKey
                                , vus.Email
                                , vus.FirstName
                                , vus.LastName
                                , vus.UserCredits
                                , vus.Classification
                                , vus.GPA
                          FROM vew_users AS vus 
                          WHERE vus.UserId = :userId 
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

    const GET_ALL_CLASSES_BY_COLLEGE = "SELECT cls.ClassId
                                          , cls.CollegeId
                                          , cls.CreditHours
                                          , cls.ShortName
                                          , cls.Name
                                        FROM classes AS cls
                                        WHERE cls.CollegeId = :collegeId";

    const GET_CLASS_BY_ID = "SELECT cls.ClassId
                                  , cls.CollegeId
                                  , cls.CreditHours
                                  , cls.ShortName
                                  , cls.Name
                            FROM classes AS cls
                            WHERE cls.ClassId = :classId 
                            LIMIT 1;";

    const GET_CLASS_VIEW = "SELECT vcl.ClassId
                                  , vcl.CollegeId
                                  , vcl.CreditHours
                                  , vcl.ShortName
                                  , vcl.Name
                                  , vcl.AverageUserGrade
                                  , vcl.AverageUserRating
                                  , vcl.TotalTimesTaken
                            FROM vew_classes AS vcl
                            WHERE vcl.ClassId = :classId 
                            LIMIT 1;";

    const GET_CLASS_PREREQUISITES = "SELECT cls.ClassId
                                              , cls.CollegeId
                                              , cls.CreditHours
                                              , cls.ShortName
                                              , cls.Name
                                        FROM classes AS cls
                                        WHERE cls.ClassId IN 
                                          (SELECT PrevClassId 
                                          FROM classprerequisites AS clp
                                          WHERE clp.ClassId = :classId);";

    const GET_CLASSES_BY_CURRICULUM = "SELECT cls.ClassId
                                              , cls.CollegeId
                                              , cls.CreditHours
                                              , cls.ShortName
                                              , cls.Name
                                        FROM classes AS cls
                                        WHERE cls.ClassId IN 
                                          (SELECT coc.ClassId
                                           FROM concentrationclass AS coc
                                           WHERE coc.ConcentrationId = :concentrationId);";

    #COLLEGES
    const GET_ALL_COLLEGES = "SELECT col.CollegeId
                                    , col.Name
                              FROM colleges AS col;";

    const GET_COLLEGE_BY_ID = "SELECT col.CollegeId
                                    , col.Name
                                FROM colleges AS col
                                WHERE col.CollegeId = :collegeId LIMIT 1;";

    #CURRICULA
    const GET_ALL_CURRICULA = "SELECT cur.CurriculumId
                                      , cur.DepartmentId
                                      , cur.EffectiveDate
                                      , cur.ExpirationDate
                                      , cur.Name
                                FROM curricula AS cur;";

    const GET_CURRICULUM_BY_ID = "SELECT cur.CurriculumId
                                      , cur.DepartmentId
                                      , cur.EffectiveDate
                                      , cur.ExpirationDate
                                      , cur.Name
                                FROM curricula AS cur
                                WHERE cur.CurriculumId = :curriculumId 
                                LIMIT 1;";

    const GET_CURRICULA_BY_DEPARTMENT = "SELECT cur.CurriculumId
                                              , cur.DepartmentId
                                              , cur.EffectiveDate
                                              , cur.ExpirationDate
                                              , cur.Name
                                        FROM curricula AS cur
                                        WHERE cur.DepartmentId = :departmentId;";

    #CONCENTRATIONS
    const GET_ALL_CONCENTRATIONS = "SELECT con.ConcentrationId
                                          , con.CurriculumId
                                          , con.Name
                                    FROM concentrations AS con;";

    const GET_CONCENTRATION_BY_ID = "SELECT con.ConcentrationId
                                          , con.CurriculumId
                                          , con.Name
                                    FROM concentrations AS con
                                    WHERE con.ConcentrationID = :concentrationId 
                                    LIMIT 1;";

    const GET_CONCENTRATIONS_BY_CURRICULUM = "SELECT con.ConcentrationId
                                                    , con.CurriculumId
                                                    , con.Name
                                                FROM concentrations AS con
                                                WHERE con.CurriculumId = :curriculumId;";

    #CLASSIFICATIONS
    const GET_CLASSIFICATIONS_BY_COLLEGE = "SELECT chr.ConcentrationId
                                                    , chr.CurriculumId
                                                    , chr.Name
                                            FROM classificationhours AS chr
                                            WHERE chr.CollegeId = :collegeId;";

    #DEPARTMENTS
    const GET_ALL_DEPARTMENTS = "SELECT dep.DepartmentId
                                        , dep.CollegeId
                                        , dep.CollegeId
                                  FROM departments AS dep;";

    const GET_DEPARTMENT_BY_ID = "SELECT dep.DepartmentId
                                        , dep.CollegeId
                                        , dep.CollegeId
                                  FROM departments AS dep
                                  WHERE dep.DepartmentId = :departmentId 
                                  LIMIT 1;";

    const GET_DEPARTMENTS_BY_COLLEGE = "SELECT dep.DepartmentId
                                                , dep.CollegeId
                                                , dep.CollegeId
                                          FROM departments AS dep
                                          WHERE dep.CollegeId = :collegeId;";

    #CLASS USER PREREQUISITES
    const GET_USER_PREREQUISITES_BY_CLASS = "SELECT cup.ClassId
                                                    , cup.ClassUserPrerequisiteId
                                                    , cup.Comparator
                                                    , cup.UserProperty
                                                    , cup.Value
                                              FROM classuserprerequisites AS cup
                                              WHERE cup.ClassId = :classId;";

    #GPA DEFINITIONS
    const GET_GPA_DEFINITIONS_BY_COLLEGE = "SELECT gpd.CollegeGpaDefinitionId
                                                    , gpd.CollegeId
                                                    , gpd.GpaDefinition
                                                    , gpd.LetterDefinition
                                                    , gpd.PercentGrade
                                            FROM collegegpadefinitions AS gpd
                                            WHERE gpd.CollegeId = :collegeId;";

    #USER CLASS HISTORY
    const GET_USER_CLASS_HISTORY_BY_USER = "SELECT uch.ClassId
                                                    , uch.UserId
                                                    , uch.PercentGrade
                                                    , uch.Rating
                                                    , uch.Review
                                                    , uch.Status
                                                    , uch.TakenDate
                                            FROM userclasshistory AS uch
                                            WHERE uch.UserId = :userId;";

    #USER CONCENTRATIONS
    const GET_ALL_USER_CONCENTRATION = "SELECT ucs.ConcentrationId
                                                , ucs.UserId
                                                , ucs.StartDate
                                            FROM userconcentrations AS ucs;";

    const GET_USER_CONCENTRATION_BY_USER = "SELECT ucs.ConcentrationId
                                                , ucs.UserId
                                                , ucs.StartDate
                                            FROM userconcentrations AS ucs
                                            WHERE ucs.UserId = :userId;";

    const GET_USER_CONCENTRATION_BY_CONCENTRATION = "SELECT ucs.ConcentrationId
                                                        , ucs.UserId
                                                        , ucs.StartDate
                                                    FROM userconcentrations AS ucs
                                                    WHERE ucs.ConcentrationId = :concentrationId;";
}