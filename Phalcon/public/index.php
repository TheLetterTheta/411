<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 8/22/2016
 * Time: 18:11 PM
 */

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

try {

    // Register an autoloader
    $loader = new Loader();
    $loader->registerDirs(array(
        '../app/controllers/',
        '../app/models/'
    ))->register();

    // Create a DI
    $di = new FactoryDefault();

    $di->set('db', function () {
        return new DbAdapter([
            "host"     => "localhost",
            "username" => "root",
            "password" => "",
            "dbname"   => "cmps_411"
        ]);
    });


    // Setup the view component
    $di->set('view', function () {
        $view = new View();
        $view->setViewsDir('../app/views/');
        return $view;
    });

    // Setup a base URI so that all generated URIs include the "tutorial" folder
    $di->set('url', function () {
        $url = new UrlProvider();
        $url->setBaseUri('/tutorial/');
        return $url;
    });

    $application = new Application($di);

    // Handle the request
    $response = $application->handle();

    $response->send();

} catch (\Exception $e) {
    echo "Exception: ", $e->getMessage();
}