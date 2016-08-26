<?php
use Phalcon\Http\Response;

$app->get('/class/{id:[0-9]+}', function ($id) use ($app){

    $phql = "SELECT * FROM classes WHERE classes.CollegeId = :id:";
    $classes = $app->modelsManager->executeQuery($phql, array(
        'id' => $id
    ));

    // Create a response
    $response = new Response();

    if (count($classes)==0) {
        $response->setJsonContent(
            array(
                'status' => 'NOT-FOUND'
            )
        );
    } else {
        $data =array();
        foreach ($classes as $class) {
            array_push($data, $class);
        }

        echo json_encode($data);
    }

    return $response;

});