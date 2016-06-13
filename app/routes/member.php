<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 5/25/2016
 * Time: 22:57 PM
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/user', function(){
    $this->get('/', function () {
        $userService = new UserService($this->db);
        $users = $userService->GetUsers();
        echo json_encode($users);
    });
    $this->get('/{id:[0-9]+}', function(Request $request, Response $response, $args){
        $userService = new UserService($this->db);
        $user = $userService->GetUserDetails($args["id"]);
        return json_encode($user);
    });
});