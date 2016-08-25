<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 8/24/2016
 * Time: 21:21 PM
 */

$app->get('/user', function () use ($app) {
    $phql = "SELECT * FROM users";
    $users = $app->modelsManager->executeQuery($phql);

    $data = array();
    foreach ($users as $user) {
        array_push($data,$user);
    }

    echo json_encode($data);
});

$app->get('/user/{id:[0-9]+}', function ($id) {

});

// Adds a new robot
$app->post('/user', function () {

});

// Updates robots based on primary key
$app->put('/user/{id:[0-9]+}', function () {

});

// Deletes robots based on primary key
$app->delete('/user/{id:[0-9]+}', function () {

});
