<?php
use Phalcon\Http\Response;


$app->post('/user/login', function () use ($app) {
    $data =[
        'id'=>1,
        'name'=>'Test'
    ];

    return json_encode($data);
});