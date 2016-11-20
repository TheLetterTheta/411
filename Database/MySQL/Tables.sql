DROP DATABASE IF EXISTS `cmps_411`;
CREATE DATABASE `cmps_411`;
USE `cmps_411`;

CREATE TABLE Users
(
  UserId VARCHAR(32) NOT NULL
  , WNumber CHAR(8)
  , ApiKey VARCHAR(16)
  , GPA DECIMAL(4,3)
  , CONSTRAINT PK_Users
    PRIMARY KEY (UserId)
);

CREATE TABLE Catalog
(
  CatalogId VARCHAR(32) NOT NULL
  , IsMajor BIT NOT NULL
  , PRIMARY KEY (CatalogId)
);

CREATE TABLE UserCatalog
(
  UserId VARCHAR(32) NOT NULL
  , CatalogId VARCHAR(32) NOT NULL
  , PRIMARY KEY (UserId, CatalogId)
  , FOREIGN KEY (UserId)
    REFERENCES Users(UserId)
  , FOREIGN KEY (CatalogId)
    REFERENCES Catalog(CatalogId)
);

CREATE TABLE Questions
(
  QuestionId INT NOT NULL AUTO_INCREMENT
  , QuestionType TINYINT NOT NULL
  , PRIMARY KEY (QuestionId)
);

CREATE TABLE QuestionChoices
(
  QuestionChoiceId INT NOT NULL AUTO_INCREMENT
  , QuestionId INT NOT NULL
  , ClassId VARCHAR(32) NOT NULL
);

CREATE TABLE QuestionResponses
(
  QuestionResponseId INT NOT NULL AUTO_INCREMENT
  , UserId VARCHAR(32) NOT NULL
  , QuestionId VARCHAR(32) NOT NULL
  , QuestionChoice VARCHAR(32) NOT NULL
  , ResponseType TINYINT
  , PRIMARY KEY (QuestionResponseId)
  , FOREIGN KEY (UserId)
    REFERENCES Users(UserId)
  , FOREIGN KEY (QuestionId)
    REFERENCES Questions(QuestionId)
);

CREATE TABLE Semesters
(
    SemesterId VARCHAR(32) NOT NULL
  , SemesterName CHAR(7) NOT NULL
  , `Year` INT NOT NULL
  , CONSTRAINT PK_Semesters
      PRIMARY KEY (SemesterId)
);

CREATE TABLE MajorMinors
(
  MajorMinorId VARCHAR(32) NOT NULL
  , Name VARCHAR(128)
  , CONSTRAINT PK_MajorMinors
    PRIMARY KEY (MajorMinorId)
);

CREATE TABLE UserMajorMinors
(
  UserId VARCHAR(32) NOT NULL
  , MajorMinorId VARCHAR(32) NOT NULL
  , CONSTRAINT FK_UserMajorMinors_Users
    FOREIGN KEY (UserId)
      REFERENCES Users(UserId)
  , CONSTRAINT FK_UserMajorMinors_MajorMinors
      FOREIGN KEY (MajorMinorId)
      REFERENCES MajorMinors(MajorMinorId)
);

CREATE TABLE Classes
(
  ClassId VARCHAR(32) NOT NULL
  , ClassName VARCHAR(32)
  , Hours INT NOT NULL
  , CONSTRAINT PK_Classes
    PRIMARY KEY (ClassId)
);

CREATE TABLE ClassRatings
(
  ClassId VARCHAR(32) NOT NULL
  , UserId VARCHAR(32) NOT NULL
  , HoursRequiredRating INT NOT NULL
  , DifficultyRating INT NOT NULL
  , CONSTRAINT FK_ClassRatings_Classes
    FOREIGN KEY (ClassId)
    REFERENCES Classes(ClassId)
  , CONSTRAINT FK_ClassRatings_Users
    FOREIGN KEY (UserId)
    REFERENCES Users(UserId)
  , CONSTRAINT PK_ClassRatings
    PRIMARY KEY (ClassId, UserId)
);

CREATE TABLE StudentPlan
(
  StudentPlanId INT NOT NULL
  , StudentId VARCHAR(32) NOT NULL
  , SemesterId VARCHAR(32) NOT NULL
  , ClassId VARCHAR(32) NOT NULL
  , CONSTRAINT PK_StudentPlan
    PRIMARY KEY (StudentPlanId)
  , CONSTRAINT FK_StudentPlan_Users
    FOREIGN KEY (StudentId)
    REFERENCES Users(UserId)
  , CONSTRAINT FK_StudentPlan_Semester
    FOREIGN KEY (SemesterId)
    REFERENCES Semesters(SemesterId)
  , CONSTRAINT FK_StudentPlan_Classes
    FOREIGN KEY (ClassId)
    REFERENCES Classes(ClassId)
);

CREATE TABLE StudentAlternativeClasses
(
  StudentAlternativeClassesId INT NOT NULL
  , StudentId VARCHAR(32) NOT NULL
  , ClassId VARCHAR(32) NOT NULL
  , CONSTRAINT PK_StudentAlternativeClasses
    PRIMARY KEY (StudentAlternativeClassesId)
  , CONSTRAINT FK_StudentAlternativeClasses_Users
    FOREIGN KEY (StudentId)
    REFERENCES Users(UserId)
  , CONSTRAINT FK_StudentAlternativeClasses_Classes
    FOREIGN KEY (ClassId)
    REFERENCES Classes(ClassId)
);