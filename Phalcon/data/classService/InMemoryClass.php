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
                'classNumber' => 165,
                'fullName' => 'PRECALCULUS W/TRIG',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'Act Math',
                            'value' => 25
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
            ),
            array(
                'id' => 3,
                'shortName' => 'Math',
                'classNumber' => 161,
                'fullName' => 'COLLEGE ALGEBRA',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'Act Math',
                            'value' => 21
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
                'id' => 5,
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
                'id' => 70,
                'shortName' => 'Math',
                'classNumber' => 370,
                'fullName' => 'ABSTRACT ALGEBRA I',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' =>'Math 360'
                        )
                    )
                ),
                'semester' =>array(
                    'fa'
                ),
                'hours' => 3
            ),
            array(
                'id' => 7,
                'shortName' => 'CMPS',
                'classNumber' => 161,
                'fullName' => ' ALGORITHM DESIGN AND IMPLEMENTATION I',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'Math 161'
                        )
                    )
                ),
                'semester' =>array(
                'fa'
                ),
                'hours' => 3
            ),
            array(
                'id' => 79,
                'shortName' => 'CMPS',
                'classNumber' => 401,
                'fullName' => ' SURVEY OF PROGRAMMING LANGUAGES',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 390'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 8,
                'shortName' => 'CMPS',
                'classNumber' => 257,
                'fullName' => 'DISCRETE STRUCTURE',
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
            ),
            array(
                'id' => 9,
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
                            'value' => 'Math 161'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 10,
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
            ),
            array(
                'id' => 11,
                'shortName' => 'CMPS',
                'classNumber' => 120,
                'fullName' => 'VISUAL PROGRAMMING',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'MATH 161'
                        ),
                        array(
                            'type' => 'class',
                            'value' => 'MATH 165'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 12,
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
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 13,
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
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 14,
                'shortName' => 'CMPS',
                'classNumber' => 375,
                'fullName' => 'COMPUTER ARCHITECTURE',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 290'
                        )
                    )
                ),
                'semester' =>array(
                    'sp'
                ),
                'hours' => 3
            ),
            array(
                'id' => 15,
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
            ),
            array(
                'id' => 16,
                'shortName' => 'CMPS',
                'classNumber' => 391,
                'fullName' => 'NUMERICAL METHODS',
                'prerequisites' =>array(
                    array(
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
            ),
            array(
                'id' => 17,
                'shortName' => 'MATH',
                'classNumber' => 360,
                'fullName' => 'LINEAR ALGEBRA I',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'MATH 201'
                        )
                    ),
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'Math 223'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp'
                ),
                'hours' => 3
            ),
            array(
                'id' => 18,
                'shortName' => 'MATH',
                'classNumber' => 223,
                'fullName' => 'FOUNDA OF DISCRETE MATH',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'MATH 200'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp'
                ),
                'hours' => 3
            ),
            array(
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
            ),
            array(
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
            ),
            array(
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
            ),
            array(
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
            ),
            array(
                'id' => 69,
                'shortName' => 'MATH',
                'classNumber' => 312,
                'fullName' => 'CALCULUS III',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'MATH 201'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp'
                ),
                'hours' => 3
            ),
            array(
                'id' => 68,
                'shortName' => 'MATH',
                'classNumber' => 350,
                'fullName' => 'ORDINARY DIFFERENTIAL EQUATIONS',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'MATH 201'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp'
                ),
                'hours' => 3
            ),
            array(
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
            ),
            array(
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
            ),
            array(
                'id' => 25,
                'shortName' => 'CMPS',
                'classNumber' => 447,
                'fullName' => 'INTRODUCTION TO ROBOTICS',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 280'
                        )
                    ),
                    array(
                        array(
                            'type' => 'year',
                            'value' => 'even'
                        )
                    )
                ),
                'semester' =>array(
                    'fa'
                ),
                'hours' => 3
            ),
            array(
                'id' => 6,
                'shortName' => 'CMPS',
                'classNumber' => 420,
                'fullName' => 'HUMAN COMPUTER INTERACTION',
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
            ),
            array(
                'id' => 26,
                'shortName' => 'CMPS',
                'classNumber' => 315,
                'fullName' => 'SYSTEM ADMINISTRATION',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'CMPS 285'
                        )
                    )
                ),
                'semester' =>array(
                    'fa'
                ),
                'hours' => 3
            ),
            array(
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
            ),
            array(
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
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 29,
                'shortName' => 'ENGL',
                'classNumber' => 322,
                'fullName' => ' INTRO TO PROFESSIONAL AND TECHNICAL WRITING',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'ENGL 102'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 30,
                'shortName' => 'ENGL',
                'classNumber' => 230,
                'fullName' => 'WORLD LITERATURE',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'ENGL 102'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 31,
                'shortName' => 'ENGL',
                'classNumber' => 231,
                'fullName' => 'ENGLISH LITERATURE',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'ENGL 102'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 32,
                'shortName' => 'ENGL',
                'classNumber' => 232,
                'fullName' => 'AMERICAN LITERATURE',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'ENGL 102'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 41,
                'shortName' => 'MUS',
                'classNumber' => 151,
                'fullName' => 'INTRO TO MUSIC',
                'prerequisites' =>array(

                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 42,
                'shortName' => 'ART',
                'classNumber' => 105,
                'fullName' => 'SURVEY WORLD ART HISTORY I',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 43,
                'shortName' => 'DNC',
                'classNumber' => 100,
                'fullName' => ' INTRODUCTION TO DANCE',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 44,
                'shortName' => 'THEA',
                'classNumber' => 131,
                'fullName' => 'INTRO THEATRE',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 45,
                'shortName' => 'HIST',
                'classNumber' => 101,
                'fullName' => 'WESTERN CIVILIZATION TO 1500',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 46,
                'shortName' => 'COMM',
                'classNumber' => 211,
                'fullName' => 'INTRODUCTION TO PUBLIC SPEAKING',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 47,
                'shortName' => 'ECON',
                'classNumber' => 201,
                'fullName' => 'PRINCIPLES OF  ECONOMICS (MACROECONOMICS)',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 48,
                'shortName' => 'ECON',
                'classNumber' => 202,
                'fullName' => 'PRINCIPLES OF  ECONOMICS (MICROECONOMICS)',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 50,
                'shortName' => 'ANTH',
                'classNumber' => 101,
                'fullName' => 'CULTURAL ANTHROPOLOGY',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 49,
                'shortName' => 'SE',
                'classNumber' => 101,
                'fullName' => 'FRESHMAN ACADEMIC SUCCESS AT SOUTHEASTERN',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 2
            ),
            array(
                'id' => 51,
                'shortName' => 'CJ',
                'classNumber' => 101,
                'fullName' => 'INTRODUCTION TO CRIMINAL JUSTICE',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 52,
                'shortName' => 'GEOG',
                'classNumber' => 103,
                'fullName' => 'INTRODUCTION TO GEOGRAPHY',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 53,
                'shortName' => 'PSYC',
                'classNumber' => 101,
                'fullName' => 'GEN PSYCHOLOGY I',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 54,
                'shortName' => 'POLI',
                'classNumber' => 201,
                'fullName' => 'AMERICAN POLITICS',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 55,
                'shortName' => 'SOC',
                'classNumber' => 101,
                'fullName' => 'INTRO SOCIOLOGY',
                'prerequisites' =>array(
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 56,
                'shortName' => 'GBIO',
                'classNumber' => 151,
                'fullName' => 'GENERAL BIOLOGY I',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'ENGL 101'
                        )
                    ),
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'MATH 155'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 57,
                'shortName' => 'GBIO',
                'classNumber' => 153,
                'fullName' => 'GENERAL BIOLOGY II',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'GBIO 153'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 58,
                'shortName' => 'BIOL',
                'classNumber' => 152,
                'fullName' => 'GENERAL BIOLOGY LAB I',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'GBIO 151'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 1
            ),
            array(
                'id' => 59,
                'shortName' => 'BIOL',
                'classNumber' => 154,
                'fullName' => 'GENERAL BIOLOGY LAB II',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'GBIO 153'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 1
            ),
            array(
                'id' => 60,
                'shortName' => 'PHYS',
                'classNumber' => 221,
                'fullName' => 'GEN PHYSICS',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'MATH 200'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp'
                ),
                'hours' => 3
            ),
            array(
                'id' => 61,
                'shortName' => 'PHYS',
                'classNumber' => 222,
                'fullName' => 'GEN PHYSICS',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'PHYS 221'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp'
                ),
                'hours' => 3
            ),
            array(
                'id' => 62,
                'shortName' => 'PLAB',
                'classNumber' => 223,
                'fullName' => 'GEN PHYS LAB',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'PHYS 221'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp'
                ),
                'hours' => 1
            ),
            array(
                'id' => 63,
                'shortName' => 'PLAB',
                'classNumber' => 224,
                'fullName' => 'GEN PHYS LAB',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'PHYS 221'
                        )
                    ),
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'PLAB 223'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp'
                ),
                'hours' => 1
            ),
            array(
                'id' => 64,
                'shortName' => 'CHEM',
                'classNumber' => 121,
                'fullName' => 'GENERAL CHEMISTRY I FOR SCIENCE MAJORS',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'Act Math',
                            'value' => 25
                        ),
                        array(
                            'type' => 'class',
                            'value' => 'MATH 155'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 65,
                'shortName' => 'CHEM',
                'classNumber' => 122,
                'fullName' => 'GENERAL CHEMISTRY II FOR SCIENCE MAJORS',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'CHEM 121'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 3
            ),
            array(
                'id' => 66,
                'shortName' => 'CLAB',
                'classNumber' => 123,
                'fullName' => 'GENERAL CHEMISTRY LABORATORY I FOR SCIENCE MAJORS',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'CHEM 121'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 1
            ),
            array(
                'id' => 67,
                'shortName' => 'CLAB',
                'classNumber' => 124,
                'fullName' => 'GENERAL CHEMISTRY LABORATORY II FOR SCIENCE MAJORS',
                'prerequisites' =>array(
                    array(
                        array(
                            'type' => 'class',
                            'value' => 'CHEM 122'
                        ),
                        array(
                            'type' => 'class',
                            'value' => 'CLAB 123'
                        )
                    )
                ),
                'semester' =>array(
                    'fa','sp','su'
                ),
                'hours' => 1
            )
        );
    }

    public function getClasses()
    {
        return $this->classes;
    }

    public function getClassesById($userId)
    {
        foreach($this->classes as $class){
            
        }
    }
}