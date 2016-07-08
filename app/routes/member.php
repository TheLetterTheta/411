<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 5/25/2016
 * Time: 22:57 PM
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/api', function() use ($app){
    $app->group('/user', function() use ($app){
        $app->get('', function () {
            $userService = new UserService($this->db);
            $users = $userService->GetUsers();
            echo json_encode($users);
        });
        $app->get('/{id:[0-9]+}', function(Request $request, Response $response, $args){
            $userService = new UserService($this->db);
            $user = $userService->GetUserDetails($args["id"]);
            return json_encode($user);
        });
        $app->post('', function (Request $request, Response $response, $args) {
            $user = new user();
            $data=$request->getParsedBody();
            $user->Email=$data['email'];
            $user->FirstName= $data['firstName'];
            $user->LastName = $data['lastName'];
            $user->CollegeId = $data['collegeId'];
            $user->ApiKey = $data['apiKey'];
            $userService = new UserService($this->db);
            $result=$userService->PostUser($user);
            return $result;


        });
    });

    $app->group('/class', function() use ($app){
        $app->get('/university/{universityId:[0-9]+}', function(Request $request, Response $response, $args){
            $classService = new CollegeClassService($this->db);
            $classes = $classService->GetClassesByCollegeId($args["universityId"]);
            return json_encode($classes);
        });
        $app->get('/{classId:[0-9]+}', function(Request $request, Response $response, $args){
            $classService = new CollegeClassService($this->db);
            $class = $classService->GetClassById($args["classId"]);
            return json_encode($class);
        });
    });
});