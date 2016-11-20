<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 11/17/2016
 * Time: 2:01
 */
use Phalcon\Di;

class QuestionnaireService implements IQuestionnaireService
{
    private $di;
    public function __construct()
    {
        $this->di = DI::getDefault();
    }


    public function getQuestionnaire($userId)
    {
        return $this->di["questionnaireService"]->getQuestionnaire();
    }
}