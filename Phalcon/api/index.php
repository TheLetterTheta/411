<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 8/24/2016
 * Time: 21:18
 */

header("Access-Control-Allow-Origin: *");

use Phalcon\Loader;
use Phalcon\Mvc\Micro;
use Phalcon\Di\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Mysql as PdoMysql;

require 'const/FUNCTIONS.php';
require 'const/CONSTANTS.php';
require 'services/UserService/IUserService.php';
require 'services/UserService/UserService.php';
require 'services/PlannerService/IPlannerService.php';
require 'services/PlannerService/PlannerService.php';
require '../data/dataServiceConf.php';
require 'services/MajorMinorService/IMajorMinorService.php';
require 'services/MajorMinorService/MajorMinorService.php';
require 'services/ClassService/IClassService.php';
require 'services/ClassService/ClassService.php';
require 'services/Questionnaire/IQuestionnaireService.php';
require 'services/Questionnaire/QuestionnaireService.php';

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
$di->set('dataUserService', function(){
    $serviceConf = new dataServiceConf();
    return $serviceConf->GetUserDataService();
});
$di->set('majorMinorService', function(){
    return new majorMinorService();
});
$di->set('dataMajorMinorService', function(){
    $serviceConf = new dataServiceConf();
    return $serviceConf->GetMajorMinorService();
});
$di->set('classService', function(){
    return new ClassService();
});
$di->set('dataClassService', function(){
    $serviceConf = new dataServiceConf();
    return $serviceConf->GetClassService();
});
$di->set('plannerService', function(){
    return new PlannerService();
});
$di->set('questionnaireService', function(){
    $serviceConf = new dataServiceConf();
    return $serviceConf->GetQuestionnaireService();
});
$di->set('plannerDataService', function(){
    $serviceConf = new dataServiceConf();
    return $serviceConf->GetPlannerDataService();
});

$app = new Micro($di);

// Define the routes here
require 'routes/plannerRoutes.php';
require 'routes/userRoutes.php';
require 'routes/majorMinorRoutes.php';
require 'routes/classRoutes.php';
require 'routes/questionnaireroute.php';

$app->handle();