<?php
use Phalcon\Http\Response;

$app->post('/user/login', function () use ($app) {
    $wNumber = $_POST['wNumber'];
    $password = $_POST['password'];

    $response = new Response();

    $loginResponse = $app->di['userService']->login($wNumber, $password);
    if($loginResponse["successful"]){
        $response->setStatusCode(200, "Successful");
        return $loginResponse["apiKey"];
    }
});
$app->get('/user/users', function () use ($app) {
    $response = $app->di['userService']->GetUsers();
    return json_encode($response);
});
$app->get('/user/users/{id:[0-9]+}', function ($id) use ($app) {
    $response = $app->di['userService']->getUser($id);
    return json_encode($response);
});

