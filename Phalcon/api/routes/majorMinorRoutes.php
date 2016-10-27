<?php
use Phalcon\Http\Response;

$app->get('/majorminor/majors/{userId}', function ($userId) use ($app) {
    $Response = $app->di['majorMinorService']->getMajors($userId);
    return json_encode($Response);
});
$app->get('/majorminor/minors/{userId}', function ($userId) use ($app) {
    $Response = $app->di['majorMinorService']->getMinors($userId);
    return json_encode($Response);
});
$app->get('/majorminor/getUserMajors/{userId}', function ($userId) use ($app) {
    $Response = $app->di['majorMinorService']->getUserMajors($userId);
    return json_encode($Response);
});
$app->get('/majorminor/getUserMinors/{userId}', function ($userId) use ($app) {
    $Response = $app->di['majorMinorService']->getUserMinors($userId);
    return json_encode($Response);
});