<?php
$app->get('/class/classes', function () use ($app) {
    $response = $app->di['classService']->getClasses();
    return json_encode($response);
});
$app->get('/class/classes/{id}', function ($id) use ($app) {
    $response = $app->di['classService']->getClassById($id);
    return json_encode($response);
});
$app->get('/class/history/{userId}', function($userId) use ($app){
    $response = $app->di['classService']->getClassHistoryByUserId($userId);
    return json_encode($response);
});