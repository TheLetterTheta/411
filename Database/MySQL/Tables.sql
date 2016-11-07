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