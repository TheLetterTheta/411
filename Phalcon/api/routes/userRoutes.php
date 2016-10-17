<?php
use Phalcon\Http\Response;


$app->post('/user/login', function () use ($app) {
    $wNumber = $_POST['wNumber'];
    $password = $_POST['password'];
    
    $app->di['userService']->login($wNumber, $password);
});