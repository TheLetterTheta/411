<?php
/**
 * Created by PhpStorm.
 * User: ThatGuyJustNow
 * Date: 10/20/2016
 * Time: 7:12 AM
 */
$app->get('/planner/buildPlanner', function () use ($app) {
    $response = $app->di['plannerService']->createPlanner();
    return json_encode($response);
});