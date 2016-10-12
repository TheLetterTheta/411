<?php
use Phalcon\Http\Response;


$app->get('/user/login', function () use ($app) {
    $wNumber = $_GET['wNumber'];
    $password = $_GET['encryptedPassword'];
    $app->di['userService']->Login($wNumber, $password);
}