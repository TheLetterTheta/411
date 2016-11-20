<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 11/17/2016
 * Time: 2:06
 */
$app->get('/questionnaire/{userId}', function ($userId) use ($app) {
    $response = $app->di['QuestionnaireService']->getQuestionnaire($userId);
    
    return json_encode($response);
});