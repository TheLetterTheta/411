<?php

require '../vendor/autoload.php';
require '../app/data/const/constants.php';
require '../app/data/const/functions.php';
require '../app/data/const/prepared-statements.php';


$config['displayErrorDetails'] = true;
$config['db']['host']   = CONSTANTS::DB_HOST;
$config['db']['user']   = CONSTANTS::DB_USER;
$config['db']['pass']   = CONSTANTS::DB_PASSWORD;
$config['db']['dbname'] = CONSTANTS::DB_DATABASE;

$app = new \Slim\App(["settings" => $config]);

$container = $app->getContainer();
$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'],
        $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

//Models
require '/../app/lib/models/class-prerequisite.php';
require '/../app/lib/models/class-user-prerequisites.php';
require '/../app/lib/models/classification-hour.php';
require '/../app/lib/models/college.php';
require '/../app/lib/models/college-class.php';
require '/../app/lib/models/college-gpa-definition.php';
require '/../app/lib/models/concentration.php';
require '/../app/lib/models/concentration-class.php';
require '/../app/lib/models/curriculum.php';
require '/../app/lib/models/department.php';
require '/../app/lib/models/user.php';
require '/../app/lib/models/user-class-history-item.php';
require '/../app/lib/models/user-concentration.php';

//View Models
require '/../app/lib/dtos/user-dto.php';
require '/../app/lib/dtos/class-dto.php';

//Services
require '/../app/lib/services/classification-service.php';
require '/../app/lib/services/college-class-service.php';
require '/../app/lib/services/college-service.php';
require '/../app/lib/services/concentration-service.php';
require '/../app/lib/services/curriculum-service.php';
require '/../app/lib/services/department-service.php';
require '/../app/lib/services/gpa-definition-service.php';
require '/../app/lib/services/user-class-history-service.php';
require '/../app/lib/services/user-concentration-service.php';
require '/../app/lib/services/user-prerequisite-service.php';
require '/../app/lib/services/user-service.php';

require '../app/routes/session.php';
require '../app/routes/member.php';
require '../app/routes/admin.php';

$app->run();