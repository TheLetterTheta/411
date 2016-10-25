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
});
$app->get('/user/users', function () use ($app) {
    $response = $app->di['userService']->GetUsers();
    return json_encode($response);
});
$app->get('/user/profile/{id}', function ($id) use ($app) {
    $response = $app->di['userService']->getUser($id);
    return json_encode($response);
});

