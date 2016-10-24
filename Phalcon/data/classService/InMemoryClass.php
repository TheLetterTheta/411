<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 10/20/2016
 * Time: 0:03 AM
 */
class InMemoryClass implements IClassDataService
{
    private $classes;

    public function __construct()
    {
        $this->classes = array(
            array(
                'id' => 1,
                'shortName' => 'Math',
                'classNumber' => 200,
                'fullName' => 'Calculus I',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'Act Math',
                            'value' => 28
                        ),
                        array(
                            'type' => 'class',
                            'value' => 'Math 165'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 5
            ),
            array(
                'id' => 2,
                'shortName' => 'Math',
                'classNumber' => 201,
                'fullName' => 'Calculus II',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' =>'Math 200'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 5
            ),
            array(
                'id' => 3,
                'shortName' => 'Math',
                'classNumber' => 380,
                'fullName' => 'Mathematical Statistics',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' =>'Math 201'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 4,
                'shortName' => 'MATHElect',
                'classNumber' => 1,
                'fullName' => 'Math Elective',
                'prerequisites' =>array(
                    array(
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),  array(
                'id' => 10,
                'shortName' => 'CMPS',
                'classNumber' => 161,
                'fullName' => ' ALGORITHM DESIGN AND IMPLEMENTATION I',
                'prerequisites' =>array(
                    array(
                        array(
                        'type' => 'class',
                        'value' => 'Math 155'
                        ),
                        array(
                            'type' => 'class',
                            'value' => 'Math 161'
                        )
                    )
                ),
                'semester' =>array(
                'fa','sp','su'
                ),
                'hours' => 3
            ),            array(
                'id' => 11,
                'shortName' => 'CMPS',
                'classNumber' => 257,
                'fullName' => 'DISCRETE STRUCTURE',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 161'
                        ),
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 169'
                        )
                    ),
                    array(
                        array(
                        'type' => 'class',
                        'value' => 'Math 155'
                        ),
                        array(
                            'type' => 'class',
                            'value' => 'Math 161'
                        ),
                        array(
                            'type' => 'class',
                            'value' => 'Math 165'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),           array(
                'id' => 12,
                'shortName' => 'CMPS',
                'classNumber' => 280,
                'fullName' => 'ALGORITHM DESIGN AND IMPLEMENTATION II',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 161'
                        )
                    ),
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'Math 155'
                        ),
                        array(
                            'type' => 'class',
                            'value' => 'Math 161'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),          array(
                'id' => 13,
                'shortName' => 'CMPS',
                'classNumber' => 285,
                'fullName' => 'SOFTWARE ENGINEERING',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 280'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),          array(
                'id' => 14,
                'shortName' => 'CMPS',
                'classNumber' => 290,
                'fullName' => 'COMPUTER ORGANIZATION',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 120'
                        ),
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 161'
                        ),
                        array(
                            'type' => 'class',
                            'value' => 'ET 212'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),         array(
                'id' => 15,
                'shortName' => 'CMPS',
                'classNumber' => 293,
                'fullName' => 'INTRODUCTION TO ASSEMBLY LANGUAGE',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 120'
                        ),
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 161'
                        ),
                        array(
                            'type' => 'class',
                            'value' => 'ET 212'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),        array(
                'id' => 16,
                'shortName' => 'CMPS',
                'classNumber' => 375,
                'fullName' => 'COMPUTER ARCHITECTURE',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 290'
                        ),
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 293'
                        )
                    )
                ),
                'semester' =>array(
                    'sp'
                ),
                'hours' => 3
            ),       array(
                'id' => 17,
                'shortName' => 'CMPS',
                'classNumber' => 390,
                'fullName' => 'DATA STRUCTURES',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 257'
                        )
                    ),
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 280'
                        )
                    ),
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 285'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),       array(
                'id' => 18,
                'shortName' => 'CMPS',
                'classNumber' => 391,
                'fullName' => 'NUMERICAL METHODS',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 270'
                        ),
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 280'
                        )
                    ),
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'Math 360'
                        )
                    )
                ),
                'semester' =>array(
                    'fa'
                ),
                'hours' => 3
            ),      array(
                'id' => 19,
                'shortName' => 'CMPS',
                'classNumber' => 401,
                'fullName' => 'NUMERICAL METHODS',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 390'
                        )
                    )
                ),
                'semester' =>array(
                    'fa'
                ),
                'hours' => 3
            ),      array(
                'id' => 20,
                'shortName' => 'CMPS',
                'classNumber' => 411,
                'fullName' => 'Capstone I',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 390'
                        )
                    ),
                    array(
                        array(
                            'type' => 'standing',
                            'value' => 'senior'
                        )
                    )
                ),
                'semester' =>array(
                    'fa'
                ),
                'hours' => 3
            ),     array(
                'id' => 21,
                'shortName' => 'CMPS',
                'classNumber' => 415,
                'fullName' => 'INTEGRATED TECHNOLOGIES FOR ENTERPRISE SYSTEMS',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 390'
                        )
                    )
                ),
                'semester' =>array(
                    'sp'
                ),
                'hours' => 3
            ),    array(
                'id' => 22,
                'shortName' => 'CMPS',
                'classNumber' => 431,
                'fullName' => 'COMPUTER OPERATING SYSTEMS',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 375'
                        )
                    ),
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 390'
                        )
                    )
                ),
                'semester' =>array(
                    'fa'
                ),
                'hours' => 3
            ),    array(
                'id' => 23,
                'shortName' => 'CMPS',
                'classNumber' => 479,
                'fullName' => 'AUTOMATA AND FORMAL LANGUAGES',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 257'
                        ),
                         array(
                             'type' => 'class',
                             'value' => 'Math 223'
                         )
                    )
                ),
                'semester' =>array(
                    'sp'
                ),
                'hours' => 3
            ),   array(
                'id' => 24,
                'shortName' => 'CMPS',
                'classNumber' => 482,
                'fullName' => 'CURRENT TRENDS IN COMPUTER SCIENCE',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 411'
                        )
                    ),
                    array(
                        array(
                            'type' => 'standing',
                            'value' => 'senior'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),   array(
                'id' => 25,
                'shortName' => 'CMPSElective',
                'classNumber' => 1,
                'fullName' => 'Elective',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),  array(
                'id' => 26,
                'shortName' => 'CMPSElective',
                'classNumber' => 1,
                'fullName' => 'Elective',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),   array(
                'id' => 27,
                'shortName' => 'ENGL',
                'classNumber' => 101,
                'fullName' => 'Freshman Composition',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'Act English',
                            'value' => 18
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),  array(
                'id' => 28,
                'shortName' => 'ENGL',
                'classNumber' => 102,
                'fullName' => 'CRITICAL READING AND WRITING',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'Act English',
                            'value' => 29
                        ),
                        array(
                            'type' => 'class',
                            'value' => 'ENGL 101'
                        ),
                        array(
                            'type' => 'class',
                            'value' => 'ENGL 121H'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),  array(
                'id' => 29,
                'shortName' => 'ENGL',
                'classNumber' => 322,
                'fullName' => ' INTRO TO PROFESSIONAL AND TECHNICAL WRITING',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'ENGL 102'
                        ),
                        array(
                            'type' => 'class',
                            'value' => 'ENGL 122H'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),  array(
                'id' => 30,
                'shortName' => 'ENGLElective',
                'classNumber' => 1,
                'fullName' => 'Elective',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),  array(
                'id' => 31,
                'shortName' => 'SciSeq I',
                'classNumber' => 1,
                'fullName' => 'Science Sequence I',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),  array(
                'id' => 32,
                'shortName' => 'SciSeqLab I',
                'classNumber' => 1,
                'fullName' => 'Science Sequence Lab I',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 1
            ),  array(
                'id' => 33,
                'shortName' => 'SciSeq II',
                'classNumber' => 1,
                'fullName' => 'Science Sequence II',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'Science Sequence I'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ), array(
                'id' => 34,
                'shortName' => 'SciSeqLab II',
                'classNumber' => 1,
                'fullName' => 'Science Sequence Lab II',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'Science Sequence Lab I'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ), array(
                'id' => 35,
                'shortName' => 'SciSeqLab II',
                'classNumber' => 1,
                'fullName' => 'Science Sequence Lab II',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'Science Sequence Lab I'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 1
            ),  array(
                'id' => 36,
                'shortName' => 'SciCourse',
                'classNumber' => 1,
                'fullName' => 'Science Course Lecture',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),  array(
                'id' => 37,
                'shortName' => 'SciCourseLab',
                'classNumber' => 1,
                'fullName' => 'Science Course Lab',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'Science Course Lecture'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),  array(
                'id' => 38,
                'shortName' => 'FElect',
                'classNumber' => 1,
                'fullName' => 'Free Elective',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),  array(
                'id' => 39,
                'shortName' => 'FElect',
                'classNumber' => 1,
                'fullName' => 'Free Elective',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),  array(
                'id' => 40,
                'shortName' => 'FElect',
                'classNumber' => 2,
                'fullName' => 'Free Elective',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),  array(
                'id' => 41,
                'shortName' => 'FElect',
                'classNumber' => 3,
                'fullName' => 'Free Elective',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ), array(
                'id' => 42,
                'shortName' => 'ADMTElect',
                'classNumber' => 3,
                'fullName' => 'Free Elective',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ), array(
                'id' => 43,
                'shortName' => 'HistElect',
                'classNumber' => 3,
                'fullName' => 'Free Elective',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ), array(
                'id' => 44,
                'shortName' => 'COMM',
                'classNumber' => 211,
                'fullName' => 'INTRODUCTION TO PUBLIC SPEAKING',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ), array(
                'id' => 45,
                'shortName' => 'EconElect',
                'classNumber' => 1,
                'fullName' => 'Economic Elective',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ), array(
                'id' => 46,
                'shortName' => 'SocScience',
                'classNumber' => 1,
                'fullName' => 'Social Science Elective',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ), array(
                'id' => 46,
                'shortName' => 'SE',
                'classNumber' => 101,
                'fullName' => 'FRESHMAN ACADEMIC SUCCESS AT SOUTHEASTERN',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 2
            )
        );
    }

    public function getClasses()
    {
        return $this->classes;
    }

}