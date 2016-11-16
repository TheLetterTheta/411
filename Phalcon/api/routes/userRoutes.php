<?php
use Phalcon\Http\Response;

$app->post('/user/login', function () use ($app) {
    $wNumber = $_POST['wNumber'];
    $password = $_POST['password'];

    $response = new Response();

    $loginResponse = $app->di['userService']->login($wNumber, $password);
    if($loginResponse["successful"]){
        $response->setStatusCode(200, "Successful");
        return json_encode(array(
            'apiKey' => $loginResponse["apiKey"],
            'userId' => $loginResponse['userId']
        ));
    }
    else{
        $response->setStatusCode(400, "Bad Request");
    }
});

$app->get('/user/users', function () use ($app) {
    $users = $app->di['userService']->GetUsers();

    $response = new Response();
    $response->setStatusCode(200, "Successful");

    return json_encode($response);
});

$app->get('/user/profile/{id}', function ($id) use ($app) {
    $user = $app->di['userService']->getUser($id);
    $response = new Response();
    if(empty($user)) {
        $response->setStatusCode(404, "Not Found");
    }
    else{
        $response->setStatusCode(200, "Successful");
    }
    return json_encode($user);
});

