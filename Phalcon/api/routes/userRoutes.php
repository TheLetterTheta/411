<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 8/24/2016
 * Time: 21:21 PM
 */
use Phalcon\Http\Response;

$app->get('/user', function() use($app) {
    $userToken = $_GET["userId"];
    // Create a response
    $response = new Response();

    $ticket = FUNCTIONS::GET_GOOGLE_LOGIN($userToken);
    if ($ticket) {
        $googleUserId = $ticket['sub']; //Get user Id

        $phql = "SELECT * FROM users WHERE users.UserId = :id:";
        $user = $app->modelsManager->executeQuery($phql, array(
            'id' => $googleUserId
        ));

        if (count($user)==0) {
            $response->setJsonContent(
                array(
                    'status' => 'NOT-FOUND'
                )
            );
            $response->setStatusCode(404,"NOT FOUND");
        } else {
            $data = array();
            array_push($ticket, $user);
            echo json_encode($data);
        }
    }else{
        $response->setJsonContent(
            array(
                'status'=>'BAD-REQUEST'
            )
        );
        $response->setStatusCode(400,"BAD REQUEST");
    }

    return $response;
});


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
        'IsAct'=>$user['IsAct'],
        'LastModifiedDate' =>date("Y-m-d H:i:s")
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

$app->put('/user/{id}', function ($id) use ($app) {

    $user = $app->request->getPut();

    $phql = "UPDATE users SET users.CollegeId = :CollegeId:, users.TestEnglish = :TestEnglish:, users.TestMath = :TestMath:, users.TestReading=:TestReading:, users.TestScience=:TestScience:, users.IsAct=:IsAct: WHERE users.UserId  = :id:";
    $status = $app->modelsManager->executeQuery($phql, array(
        'id'=>$id,
        'CollegeId' => $user['CollegeId'],
        'TestEnglish' => $user['TestEnglish'],
        'TestMath' => $user['TestMath'],
        'TestReading'=>$user['TestReading'],
        'TestScience'=>$user['TestScience'],
        'IsAct'=>$user['IsAct'],
        'IsActive'=> $user['IsActive'],
        'LastModifiedDate' =>$user['LastModifiedDate']
    ));

    // Create a response
    $response = new Response();

    // Check if the insertion was successful
    if ($status->success() == true) {
        $response->setJsonContent(
            array(
                'status' => 'OK'
            )
        );
    } else {

        // Change the HTTP status
        $response->setStatusCode(409, "Conflict");

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

$app->delete('/user/{id}', function ($id) use($app) {

    $user =Users::findFirst(
        [
            'columns'    => '*',
            'conditions' => 'UserId = ?1',
            'bind'       => [
                1 => $id

            ]
        ]
     );
    $user->IsActive=false;
    $user->LastModifiedDate =date("Y-m-d H:i:s");
    $user->save();


    // Create a response
    $response = new Response();

    if ($user != null) {
        $response->setJsonContent(
            array(
                'status' => 'OK'
            )
        );
    } else {

        // Change the HTTP status
        $response->setStatusCode(409, "Conflict");

        $errors = array();
        $response->setJsonContent(
            array(
                'status'   => 'ERROR',
                'messages' => $errors
            )
        );
    }

    return $response;

});
