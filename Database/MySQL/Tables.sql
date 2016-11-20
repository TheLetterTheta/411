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

CREATE TABLE Classes
(
  ClassId VARCHAR(32) NOT NULL
  , ClassName VARCHAR(32)
  , Hours INT NOT NULL
  , CONSTRAINT PK_Classes
PRIMARY KEY (ClassId)
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
  , PRIMARY KEY (QuestionChoiceId)
  , FOREIGN KEY (ClassId)
    REFERENCES Classes(ClassId)
);

CREATE TABLE QuestionResponses
(
  QuestionResponseId INT NOT NULL AUTO_INCREMENT
  , UserId VARCHAR(32) NOT NULL
  , QuestionId INT NOT NULL
  , QuestionChoice VARCHAR(32) NOT NULL
  , ResponseType TINYINT
  , PRIMARY KEY (QuestionResponseId)
  , FOREIGN KEY (UserId)
    REFERENCES Users(UserId)
  , FOREIGN KEY (QuestionId)
    REFERENCES Questions(QuestionId)
);

CREATE TABLE CatalogQuestion
(
  CatalogQuestionId INT NOT NULL AUTO_INCREMENT
  , CatalogId VARCHAR(32) NOT NULL
  , QuestionId INT NOT NULL
  , PRIMARY KEY (CatalogQuestionId)
  , FOREIGN KEY (CatalogId)
    REFERENCES Catalog(CatalogId)
  , FOREIGN KEY (QuestionId)
    REFERENCES Questions(QuestionId)
);

CREATE TABLE ClassRatings
(
    ClassId VARCHAR(32) NOT NULL
  , UserId VARCHAR(32) NOT NULL
  , HoursRequiredRating INT NOT NULL
  , DifficultyRating INT NOT NULL
  , FOREIGN KEY (ClassId)
    REFERENCES Classes(ClassId)
  , FOREIGN KEY (UserId)
    REFERENCES Users(UserId)
  , PRIMARY KEY (ClassId, UserId)
);
