<?php
use Phalcon\Http\Response;


$app->get('/user', function () use ($app) {
    $response = new Response();

    $ticket = FUNCTIONS::VERIFY_GOOGLE_TOKEN($_GET['token']);
    if(!$ticket){
        $response->setJsonContent(
            array(
                'Status' => 'Forbidden'
            )
        );
        $response->setStatusCode(403, 'FORBIDDEN');
    } else {

        $phql = "SELECT * FROM users WHERE users.UserId = :id:";
        $users = $app->modelsManager->executeQuery($phql, array(
            'id' => $ticket['sub']
        ));

        if (count($users) == 0) {
            $response->setJsonContent(
                array(
                    'UserId' => $ticket['sub'],
                    'Status' => 'Not Found'
                )
            );
            $response->setStatusCode(404, 'NOT FOUND');
        } else {
            $_SESSION['UserId'] = $ticket['sub'];
        }
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
