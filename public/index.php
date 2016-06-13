<?php

require '../vendor/autoload.php';
require '../app/data/const/constants.php';
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
require '/../app/lib/models/user.php';

//View Models
require '/../app/lib/dtos/user-dto.php';

//Services
require '/../app/lib/services/user-service.php';


require '../app/routes/session.php';
require '../app/routes/member.php';
require '../app/routes/admin.php';

$app->run();