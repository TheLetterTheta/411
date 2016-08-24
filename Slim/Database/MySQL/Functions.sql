USE `cmps_411`;

DROP FUNCTION IF EXISTS `CollegeClassificationByHour`;
CREATE FUNCTION `CollegeClassificationByHour`
  (collegeId INT UNSIGNED, hours INT)
  RETURNS VARCHAR(64)
BEGIN
  DECLARE ret VARCHAR(64);
  SET ret = (SELECT ch.Classification
              FROM ClassificationHours AS ch
              WHERE ch.CollegeId = collegeId
                AND ch.Hours <= hours
              ORDER BY ch.Hours DESC
              LIMIT 1);

  RETURN ret;
END;

DROP FUNCTION IF EXISTS `CollegeGradeGpa`;
CREATE FUNCTION `CollegeGradeGpa`
  (collegeId INT UNSIGNED, grade DECIMAL)
  RETURNS DECIMAL(9,4)
BEGIN
  DECLARE ret DECIMAL(9,4);
  SET ret = (SELECT cgd.GpaDefinition
              FROM CollegeGpaDefinitions AS cgd
              WHERE cgd.CollegeId = collegeId
                AND cgd.PercentGrade <= grade
              ORDER BY cgd.PercentGrade DESC
              LIMIT 1);
  RETURN ret;
END;

DROP FUNCTION IF EXISTS `UserCollegeGpa`;
CREATE FUNCTION `UserCollegeGpa`
  (userId INT UNSIGNED, collegeId INT UNSIGNED)
  RETURNS DECIMAL(9,4)
BEGIN
  DECLARE ret DECIMAL(9,4);
  SET ret = (SELECT AVG(CollegeGradeGpa(collegeId, uh.PercentGrade))
              FROM userclasshistory AS uh
              WHERE uh.UserId = userId);
  RETURN ret;
END;