DROP DATABASE IF EXISTS cmps_411;
CREATE DATABASE cmps_411;

USE `cmps_411`;
CREATE TABLE Colleges(
  CollegeId INT UNSIGNED AUTO_INCREMENT,
  Name VARCHAR(128) NOT NULL UNIQUE,
  IsActive BIT,
  LastModifiedDate DATETIME,
  PRIMARY KEY (CollegeId)
);

CREATE TABLE Classes(
  ClassId INT UNSIGNED AUTO_INCREMENT,
  CollegeId INT UNSIGNED,
  CreditHours INT UNSIGNED,
  ShortName VARCHAR(16),
  Name VARCHAR(256),
  IsActive BIT,
  LastModifiedDate DATETIME,
  PRIMARY KEY (ClassId),
  CONSTRAINT fk_ClassCollege FOREIGN KEY (CollegeId)
    REFERENCES Colleges(CollegeId)
);

CREATE TABLE ClassificationHours(
  ClassificationHoursId INT UNSIGNED AUTO_INCREMENT,
  CollegeId INT UNSIGNED NOT NULL,
  Hours INT,
  Classification VARCHAR(64),
  IsActive BIT,
  LastModifiedDate DATETIME,
  PRIMARY KEY (ClassificationHoursId),
  CONSTRAINT fk_ClassificationHoursCollege  FOREIGN KEY (CollegeId)
    REFERENCES Colleges(CollegeId)
);

CREATE TABLE Users(
  UserId VARCHAR(32),
  CollegeId INT UNSIGNED,
  TestMath INT UNSIGNED,
  TestEnglish INT UNSIGNED,
  TestReading INT UNSIGNED,
  TestScience INT UNSIGNED,
  IsAct BIT NOT NULL,
  IsActive BIT,
  LastModifiedDate DATETIME,
  PRIMARY KEY (UserId),
  CONSTRAINT fk_UsersCollege FOREIGN KEY (CollegeId)
    REFERENCES Colleges(CollegeId) ON DELETE CASCADE
);

CREATE TABLE CollegeGpaDefinitions(
  CollegeGpaDefinitionId INT UNSIGNED AUTO_INCREMENT,
  CollegeId INT UNSIGNED,
  PercentGrade DECIMAL(9,4),
  LetterDefinition CHAR(2),
  GpaDefinition DECIMAL(9,4),
  IsActive BIT,
  LastModifiedDate DATETIME,
  PRIMARY KEY (CollegeGpaDefinitionId),
  CONSTRAINT fk_CollegeGpaDefinitionCollege FOREIGN KEY (CollegeId)
    REFERENCES Colleges(CollegeId)ON DELETE CASCADE
);

CREATE TABLE Departments(
  DepartmentId INT UNSIGNED AUTO_INCREMENT,
  CollegeId INT UNSIGNED NOT NULL,
  Name VARCHAR(128) NOT NULL,
  IsActive BIT,
  LastModifiedDate DATETIME,
  PRIMARY KEY (DepartmentId),
  CONSTRAINT fk_DepartmentCollege FOREIGN KEY (CollegeId)
    REFERENCES Colleges(CollegeId)ON DELETE CASCADE
);

CREATE TABLE ClassPrerequisites(
  ClassId  INT UNSIGNED,
  PrevClassId INT UNSIGNED,
  IsActive BIT,
  LastModifiedDate DATETIME,
  PRIMARY KEY (ClassId,  PrevClassId),
  CONSTRAINT fk_ClassPrerequisitesClass FOREIGN KEY (ClassId)
    REFERENCES Classes(ClassId)ON DELETE CASCADE,
  CONSTRAINT fk_ClassPrerequisitesPrevClass FOREIGN KEY (PrevClassId)
    REFERENCES Classes(ClassId)ON DELETE CASCADE
);

CREATE TABLE ClassUserPrerequisites(
  ClassUserPrerequisiteId INT UNSIGNED AUTO_INCREMENT,
  ClassId INT UNSIGNED,
  UserProperty VARCHAR(128),
  Comparator VARCHAR(128),
  Value VARCHAR(512),
  IsActive BIT,
  LastModifiedDate DATETIME,
  PRIMARY KEY (ClassUserPrerequisiteId),
  CONSTRAINT fk_ClassUserPrerequisiteClass FOREIGN KEY (ClassId)
  REFERENCES Classes(ClassId)ON DELETE CASCADE
);

CREATE TABLE Curricula(
  CurriculumId INT UNSIGNED AUTO_INCREMENT,
  DepartmentId INT UNSIGNED NOT NULL,
  EffectiveDate DATE,
  ExpirationDate DATE,
  Name VARCHAR(128) NOT NULL,
  IsActive BIT,
  LastModifiedDate DATETIME,
  PRIMARY KEY (CurriculumId),
  CONSTRAINT fk_CurriculumDepartment FOREIGN KEY (DepartmentId)
    REFERENCES Departments(DepartmentId)ON DELETE CASCADE
);

CREATE TABLE Concentrations(
  ConcentrationId INT UNSIGNED AUTO_INCREMENT,
  CurriculumId INT UNSIGNED NOT NULL,
  Name VARCHAR(128),
  IsActive BIT,
  LastModifiedDate DATETIME,
  PRIMARY KEY (ConcentrationId),
  CONSTRAINT fk_ConcentrationCurriculum FOREIGN KEY (CurriculumId)
    REFERENCES Curricula(CurriculumId)ON DELETE CASCADE
);

CREATE TABLE SemesterType(
  SemesterTypeId INT UNSIGNED  AUTO_INCREMENT,
  CollegeId INT UNSIGNED,
  Name VARCHAR(128),
  IsActive BIT,
  LastModifiedDate DATETIME,
  PRIMARY KEY (SemesterTypeId),
  CONSTRAINT fk_SemesterTypeCollege FOREIGN KEY (CollegeId)
    REFERENCES Colleges(CollegeId)ON DELETE CASCADE
);

CREATE TABLE UserClassHistory (
  UserId VARCHAR(32),
  ClassId INT UNSIGNED,
  SemesterTypeId INT UNSIGNED,
  PercentGrade DECIMAL(9,4),
  Status TINYINT,
  YearTaken DATE,
  Rating INT,
  Review VARCHAR(512),
  IsActive BIT,
  LastModifiedDate DATETIME,
  PRIMARY KEY (UserId, ClassId),
  CONSTRAINT fk_UserClassHistoryUser FOREIGN KEY (UserId)
    REFERENCES Users(UserId)ON DELETE CASCADE,
  CONSTRAINT fk_UserClassHistoryClass FOREIGN KEY (ClassId)
    REFERENCES Classes(ClassId)ON DELETE CASCADE,
  CONSTRAINT fk_UserClassHistorySemesterType FOREIGN KEY (SemesterTypeId)
    REFERENCES SemesterType(SemesterTypeId)ON DELETE CASCADE
);

CREATE TABLE UserConcentrations(
  UserId VARCHAR(32),
  ConcentrationId INT UNSIGNED,
  StartDate DATETIME,
  IsActive BIT,
  LastModifiedDate DATETIME,
  PRIMARY KEY (UserId,ConcentrationId),
  CONSTRAINT fk_UserConcentrationUser FOREIGN KEY (UserId)
    REFERENCES Users(UserId)ON DELETE CASCADE,
  CONSTRAINT fk_UserConcentrationConcentration FOREIGN KEY (ConcentrationId)
    REFERENCES Concentrations(ConcentrationId)ON DELETE CASCADE
);

CREATE TABLE ConcentrationClass(
  ConcentrationId INT UNSIGNED,
  ClassId INT UNSIGNED,
  IsMajorClass BIT,
  IsActive BIT,
  LastModifiedDate DATETIME,
  PRIMARY KEY (ConcentrationId, ClassId),
  CONSTRAINT fk_ConcentrationClassConcentration FOREIGN KEY (ConcentrationId)
    REFERENCES Concentrations(ConcentrationId)ON DELETE CASCADE,
  CONSTRAINT fk_ConcentrationClassClass FOREIGN KEY (ClassId)
    REFERENCES Classes(ClassId)ON DELETE CASCADE
);
