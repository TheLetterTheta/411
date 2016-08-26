<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 8/24/2016
 * Time: 21:21 PM
 */
use Phalcon\Http\Response;


$app->get('/user', function () use ($app) {
    $phql = "SELECT * FROM users";
    $users = $app->modelsManager->executeQuery($phql);

    $data = array();
    foreach ($users as $user) {
        array_push($data,$user);
    }

    echo json_encode($data);
});

$app->get('/user/{id:[0-9]+}', function ($id) use($app) {
    $phql = "SELECT * FROM users WHERE users.UserId = :id:";
    $user = $app->modelsManager->executeQuery($phql, array(
        'id' => $id
    ));

    // Create a response
    $response = new Response();

    if (count($user)==0) {
        $response->setJsonContent(
            array(
                'status' => 'NOT-FOUND'
            )
        );
    } else {
        $data =array();
        array_push($data, $user);


        echo json_encode($data);
    }

    return $response;
});

// Adds a new robot
$app->post('/user', function () use($app) {

    $user = $app->request->getPost();

    $phql = "INSERT INTO users (UserId,CollegeId,TestEnglish, TestMath,TestReading,TestScience,IsAct) VALUES (:UserId:,:CollegeId:, :TestEnglish:, :TestMath:,:TestReading:,:TestScience:,:IsAct:)";

    $status = $app->modelsManager->executeQuery($phql, array(
        'UserId'=>$user['UserId'],
        'CollegeId' => $user['CollegeId'],
        'TestEnglish' => $user['TestEnglish'],
        'TestMath' => $user['TestMath'],
        'TestReading'=>$user['TestReading'],
        'TestScience'=>$user['TestScience'],
        'IsAct'=>$user['IsAct']
    ));

    // Create a response
    $response = new Response();

    // Check if the insertion was successful
    if ($status->success() == true) {

        // Change the HTTP status
        $response->setStatusCode(201, "Created");

        $user->id = $status->getModel()->id;

        $response->setJsonContent(
            array(
                'status' => 'OK',
                'data'   => $user
            )
        );

    } else {

        // Change the HTTP status
        $response->setStatusCode(409, "Conflict");

        // Send errors to the client
        $errors = array();
        foreach ($status->getMessages() as $message) {
            $errors[] = $message->getMessage();
        }

        $response->setJsonContent(
            array(
                'status'   => 'ERROR',
                'messages' => $errors
            )
        );
    }

    return $response;
});

// Updates robots based on primary key
$app->put('/user/{id:[0-9]+}', function () {

});

// Deletes robots based on primary key
$app->delete('/user/{id:[0-9]+}', function () {

});
