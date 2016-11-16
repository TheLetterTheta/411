<?php
/**
 * Created by PhpStorm.
 * User: ThatGuyJustNow
 * Date: 10/20/2016
 * Time: 7:12 AM
 */
$app->get('/planner/{userId}', function($userId) use ($app){
    $planner = $app->di['plannerService']->getPlanner($userId);
    return json_encode($planner);
});

$app->get('/planner/buildPlanner/{userId}', function ($userId) use ($app) {
    $response = $app->di['plannerService']->createPlanner($userId);
    //return json_encode($response);
});