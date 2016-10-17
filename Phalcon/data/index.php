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
require '../../vendor/autoload.php';
require 'services/UserService/IUserService.php';
require 'services/MajorService/IMajorService.php';

require 'services/UserService/InMemoryUserService.php';
require 'services/MajorService/InMemoryMajorService.php';

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
    return new InMemoryUserService();
});
$di->set('majorService', function(){
    return new InMemoryMajorService();
});

$app = new Micro($di);

// Define the routes here
require 'routes/userRoutes.php';
require 'routes/classRoutes.php';

$app->handle();