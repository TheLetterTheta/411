USE `cmps_411`;

CREATE OR REPLACE VIEW VEW_Users AS
  SELECT u.UserId
    , u.CollegeId
    , u.ApiKey
    , u.Email
    , u.FirstName
    , u.LastName
    , IFNULL(SUM(c.CreditHours),0) AS UserCredits
    , CollegeClassificationByHour(u.CollegeId, IFNULL(SUM(c.CreditHours),0))
        AS Classification
    , UserCollegeGpa(u.UserId, u.CollegeId) AS GPA
  FROM
    users AS u
    LEFT OUTER JOIN
    userclasshistory AS uh ON u.UserId = uh.UserId
    LEFT OUTER JOIN
    classes AS c ON uh.ClassId = c.ClassId
  GROUP BY u.UserId;

CREATE OR REPLACE VIEW VEW_Classes AS
  SELECT c.ClassId
    , c.CollegeId
    , c.Name
    , c.CreditHours
    , c.ShortName
    , AVG(u.Rating) AS AverageUserRating
    , AVG(u.PercentGrade) AS AverageUserGrade
    , COUNT(u.UserId) AS TotalTimesTaken
  FROM
    classes AS c
    LEFT OUTER JOIN
    userclasshistory AS u ON c.ClassId = u.ClassId
  GROUP BY c.ClassId;

CREATE OR REPLACE VIEW VEW_Colleges AS
  SELECT c.CollegeId AS 'CollegeId'
    , c.Name AS 'Name'
    , (SELECT COUNT(*) FROM users AS u WHERE u.CollegeId = c.CollegeId) AS 'NumberOfStudents'
  FROM colleges AS c;