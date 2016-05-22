USE `cmps_411`;

CREATE OR REPLACE VIEW VEW_Users AS
  SELECT
    u.*,
    SUM(c.CreditHours) AS UserCredits
  FROM
    Users AS u
    INNER JOIN
    UserClassHistory AS uh ON u.UserId = uh.UserId
    INNER JOIN
    Classes AS c ON uh.ClassId = c.ClassId
;
