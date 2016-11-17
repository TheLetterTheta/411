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
                'classOptions'=> array(
                    array(
                        41
                    ),
                    array(
                        42
                    ),
                    array(
                        43
                    ),
                    array(
                        44
                    )
                ),
                'visibility'=> true,
                'chosenClass' => null
            ),
            array(
                'classOptions'=> array(
                    array(
                        30
                    ),
                    array(
                        31
                    ),
                    array(
                        32
                    )
                ),
                'visibility'=> true,
                'chosenClass' => null
            ),array(
                'classOptions'=> array(
                    array(
                        41
                    ),
                    array(
                        42
                    ),
                    array(
                        43
                    ),
                    array(
                        44
                    )
                ),
                'visibility'=> true,
                'chosenClass' => null
            ),
            array(
                'classOptions'=> array(
                    array(
                        45
                    )
                ),
                'visibility'=> true,
                'chosenClass' => null
            ),
            array(
                'classOptions'=> array(
                    array(
                        47
                    ),
                    array(
                        48
                    )
                ),
                'visibility'=> true,
                'chosenClass' => null
            ),
            array(
                'classOptions'=> array(
                    array(
                        50
                    ),
                    array(
                        51
                    ),
                    array(
                        52
                    ),
                    array(
                        53
                    ),
                    array(
                        54
                    ),
                    array(
                        55
                    )
                ),
                'visibility'=> true,
                'chosenClass' => null
            ),
            array(
                'classOptions'=> array(
                    array(
                        68
                    ),
                    array(
                        69
                    ),
                    array(
                        17
                    ),
                    array(
                        70
                    )
                ),
                'visibility'=> true,
                'chosenClass' => null
            ),
            array(
                'classOptions'=> array(
                    array(
                        68
                    ),
                    array(
                        69
                    ),
                    array(
                        17
                    ),
                    array(
                        70
                    )
                ),
                'visibility'=> true,
                'chosenClass' => null
            ),
            array(
                'classOptions'=> array(
                    array(
                        25
                    ),
                    array(
                        6
                    ),
                    array(
                        26
                    )
                ),
                'visibility'=> true,
                'chosenClass' => null
            ),
            array(
                'classOptions'=> array(
                    array(
                        25
                    ),
                    array(
                        6
                    ),
                    array(
                        26
                    )
                ),
                'visibility'=> true,
                'chosenClass' => null
            ),
            array(
                'classOptions'=> array(
                    array(

                    )
                ),
                'visibility'=> true,
                'chosenClass' => null
            ),
            array(
                'classOptions'=> array(
                    array(

                    )
                ),
                'visibility'=> true,
                'chosenClass' => null
            ),
            array(
                'classOptions'=> array(
                    array(

                    )
                ),
                'visibility'=> true,
                'chosenClass' => null
            ),
            array(
                'classOptions'=> array(
                    array(
                        56,57,58,59
                    ),
                    array(
                        60,61,62,63
                    ),
                    array(
                        64,65,66,67
                    )
                ),
                'visibility'=> true,
                'chosenClass' => null
            ),
            array(
                'classOptions'=> array(
                    array(
                        56,58
                    ),
                    array(
                        60,62
                    ),
                    array(
                        64,66
                    )
                ),
                'visibility'=> true,
                'chosenClass' => null
            ),
            array(
                'classOptions'=> array(
                    array(
                        56
                    ),
                    array(
                        60
                    ),
                    array(
                        64
                    ),
                    array(
                        58
                    ),
                    array(
                        62
                    ),
                    array(
                        66
                    )
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
        return $this->questionnaire;
    }
}