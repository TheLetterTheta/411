<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 11/16/2016
 * Time: 18:26
 */
class InMemoryQuestionnaire implements IQuestionnaire
{

    private $questionnaire;

    public function __construct()
    {
        $this->questionnaire = array(
            array(
                'majorsId' => array(1),
                'minorsId' => array(),
                'classOptions'=> array(
                        6,9
                ),
                'visibility'=> true,
                'chosenClass' => null
            ),
            array(
                'totalSpringSemesters'  => 4,
                'totalFallSemesters' => 4,
                'totalSummerSemesters' => 0,
                'maxHourPerRegularSemester' => null,
                'maxHourPerSummerSemester' => null
            )
        );
    }
    public function GetQuestionnaire()
    {
    }
}