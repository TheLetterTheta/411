USE `cmps_411`;

CREATE OR REPLACE VIEW VEW_Users AS
  SELECT
    u.* ,
    SUM(c.CreditHours) AS UserCredits,
    CollegeHourClassification(u.CollegeId, IFNULL(SUM(c.CreditHours),0))
      AS Classification,
    AVG(CollegeGradeGpa(u.CollegeId, uh.PercentGrade)) AS GPA
  FROM
    Users AS u
    LEFT OUTER JOIN
    UserClassHistory AS uh ON u.UserId = uh.UserId
      LEFT OUTER JOIN
      Classes AS c ON uh.ClassId = c.ClassId
  GROUP BY u.UserId;
