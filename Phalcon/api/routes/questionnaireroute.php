<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 11/17/2016
 * Time: 2:06
 */
$app->get('/questionnaire/data', function () use ($app) {
    $response = $app->di['QuestionnaireService']->getQuestionnaire();
    
    return json_encode($response);
});