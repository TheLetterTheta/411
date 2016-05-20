CREATE DATABASE cmps_411;

USE cmps_411
CREATE TABLE College(
  CollegeId INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Name VARCHAR(128) NOT NULL UNIQUE
);

CREATE TABLE Users(
  UserId INT(6) NOT NULL AUTO_INCREMENT,
  Email VARCHAR(512) NOT NULL,
  ApiKey VARCHAR(512),
  FirstName VARCHAR(64),
  LastName VARCHAR(64),
  CollegeId INT(6),
  PRIMARY KEY (UserId),
  CONSTRAINT fk_UsersCollege FOREIGN KEY (CollegeId)
  REFERENCES College(CollegeId)
);