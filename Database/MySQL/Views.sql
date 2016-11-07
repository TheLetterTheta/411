USE `cmps_411`;

CREATE OR REPLACE VIEW vew_ClassRatings
AS
  SELECT c.ClassId
        , c.ClassName
        , c.Hours
        , AVG(cr.HoursRequiredRating) AS 'AvgHoursRequiredRating'
        , AVG(cr.DifficultyRating) AS 'AvgDivicultyRating'
  FROM Classes AS c
    INNER JOIN ClassRatings AS cr ON cr.ClassId = c.ClassId
    INNER JOIN Users AS u ON u.UserId = cr.UserId
  GROUP BY c.ClassId
        , c.ClassName
        , c.Hours;