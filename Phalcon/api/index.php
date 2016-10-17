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

require 'const/FUNCTIONS.php';
require 'const/CONSTANTS.php';
require 'services/UserService/UserService.php';
require '../../vendor/autoload.php';

session_start();

// Use Loader() to autoload our model
$loader = new Loader();

$loader->registerDirs(
    array(
        __DIR__ . '../models/'
    )
)->register();

$di = new FactoryDefault();

$di->set('userService', function(){
    return new UserService();
});

$app = new Micro($di);

// Define the routes here
require 'routes/userRoutes.php';

$app->handle();