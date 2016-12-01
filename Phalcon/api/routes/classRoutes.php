<?php
$app->get('/class/classes', function () use ($app) {
    $response = $app->di['classService']->GetClasses();
    return json_encode($response);
});
$app->get('/class/classes/', function () use ($app) {
    $data= $app->request->get();
    $response = $app->di['classService']->getClassById($data);
    return json_encode($response);
});