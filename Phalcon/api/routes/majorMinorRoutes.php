<?php
use Phalcon\Http\Response;

$app->get('/majorminor/majors', function () use ($app) {
    $Response = $app->di['majorMinorService']->getMajors();
    return json_encode($Response);
});
$app->get('/majorminor/minors', function () use ($app) {
    $Response = $app->di['majorMinorService']->getMinors();
    return json_encode($Response);
});
$app->get('/majorminor/getUserMajors', function () use ($app) {
    $userId = $_GET['userId'];
    $Response = $app->di['majorMinorService']->getUserMajors($userId);
    return json_encode($Response);
});
$app->get('/majorminor/getUserMinors', function () use ($app) {
    $userId = $_GET['userId'];
    $Response = $app->di['majorMinorService']->getUserMinors($userId);
    return json_encode($Response);
});