<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 8/24/2016
 * Time: 21:18
 */

use Phalcon\Loader;
use Phalcon\Mvc\Micro;
use Phalcon\Di\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Mysql as PdoMysql;

require 'const/CONSTANTS.php';
require 'const/FUNCTIONS.php';

// Use Loader() to autoload our model
$loader = new Loader();

$loader->registerDirs(
    array(
        __DIR__ . '/models/'
    )
)->register();

$di = new FactoryDefault();

// Set up the database service
$di->set('db', function () {
    return new PdoMysql(
        array(
            "host"     => CONSTANTS::DB_HOST,
            "username" => CONSTANTS::DB_USER,
            "password" => CONSTANTS::DB_PASSWORD,
            "dbname"   => CONSTANTS::DB_DATABASE
        )
    );
});

$app = new Micro($di);

// Define the routes here
require 'routes/userRoutes.php';
require 'routes/classRoutes.php';

$app->handle();