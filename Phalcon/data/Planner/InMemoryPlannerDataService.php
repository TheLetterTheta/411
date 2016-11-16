<?php

/**
 * Created by PhpStorm.
 * User: crazy
 * Date: 11/2/2016
 * Time: 10:25
 */
class InMemoryPlannerDataService implements IPlannerDataService
{
    public function getPlanner($userId)
    {
        return array(
            "upcommingSemester" => array(
                "semester" => "Fall",
                "year" => 2016,
                "classes" => array(
                    array(
                        "chosenClass" => array(
                            "name" => "CMPS 161",
                            "creditHours" => 3,
                            "difficultyRating" => 3.0,
                            "hoursDemandedRating" => 2.0
                        ),
                        "classOptions" => array(
                            array(
                                "name" => "CMPS 161",
                                "creditHours" => 3,
                                "difficultyRating" => 3.0,
                                "hoursDemandedRating" => 2.0
                            )
                        )
                    ),
                    array(
                        "chosenClass" => array(
                            "name" => "MATH 200",
                            "creditHours" => 5,
                            "difficultyRating" => 5.0,
                            "hoursDemandedRating" => 5.0
                        ),
                        "classOptions" => array(
                            array(
                                "name" => "MATH 200",
                                "creditHours" => 5,
                                "difficultyRating" => 5.0,
                                "hoursDemandedRating" => 5.0
                            )
                        )
                    ),
                    array(
                        "chosenClass" => array(
                            "name" => "ENGL 101",
                            "creditHours" => 3,
                            "difficultyRating" => 3.0,
                            "hoursDemandedRating" => 3.0
                        ),
                        "classOptions" => array(
                            array(
                                "name" => "ENGL 101",
                                "creditHours" => 3,
                                "difficultyRating" => 3.0,
                                "hoursDemandedRating" => 3.0
                            )
                        )
                    ),
                    array(
                        "chosenClass" => array(
                            "name" => "HIST 200",
                            "creditHours" => 3,
                            "difficultyRating" => 2.0,
                            "hoursDemandedRating" => 1.0
                        ),
                        "classOptions" => array(
                            array(
                                "name" => "HIST 200",
                                "creditHours" => 3,
                                "difficultyRating" => 2.0,
                                "hoursDemandedRating" => 1.0
                            ),
                            array(
                                "name" => "HIST 201",
                                "creditHours" => 3,
                                "difficultyRating" => 2.5,
                                "hoursDemandedRating" => 2.0
                            ),
                            array(
                                "name" => "HIST 202",
                                "creditHours" => 3,
                                "difficultyRating" => 1.0,
                                "hoursDemandedRating" => 1.0
                            )
                        )
                    ),
                    array(
                        "chosenClass" => array(
                            "name" => "SE 101",
                            "creditHours" => 2,
                            "difficultyRating" => 1.0,
                            "hoursDemandedRating" => 1.0
                        ),
                        "classOptions" => array(
                            array(
                                "name" => "SE 101",
                                "creditHours" => 2,
                                "difficultyRating" => 1.0,
                                "hoursDemandedRating" => 1.0
                            )
                        )
                    )
                ),
                "alternativeClasses" => array(
                    array(
                        "chosenClass" => array(
                            "name" => "ECON 201",
                            "creditHours" => 3,
                            "difficultyRating" => 2.0,
                            "hoursDemandedRating" => 4.0
                        ),
                        "classOptions" => array(
                            array(
                                "name" => "ECON 201",
                                "creditHours" => 3,
                                "difficultyRating" => 2.0,
                                "hoursDemandedRating" => 4.0
                            ),
                            array(
                                "name" => "ECON 202",
                                "creditHours" => 3,
                                "difficultyRating" => 3.0,
                                "hoursDemandedRating" => 3.0
                            )
                        )
                    ),
                    array(
                        "chosenClass" => array(
                            "name" => "COMM 211",
                            "creditHours" => 3,
                            "difficultyRating" => 1.0,
                            "hoursDemandedRating" => 5.0
                        ),
                        "classOptions" => array(
                            array(
                                "name" => "COMM 211",
                                "creditHours" => 3,
                                "difficultyRating" => 1.0,
                                "hoursDemandedRating" => 5.0
                            )
                        )
                    ),
                    array(
                        "chosenClass" => array(
                            "name" => "BIO 151",
                            "creditHours" => 3,
                            "difficultyRating" => 4.0,
                            "hoursDemandedRating" => 3.0
                        ),
                        "classOptions" => array(
                            array(
                                "name" => "BIO 151",
                                "creditHours" => 3,
                                "difficultyRating" => 4.0,
                                "hoursDemandedRating" => 3.0
                            ),
                            array(
                                "name" => "CHEM 121",
                                "creditHours" => 3,
                                "difficultyRating" => 2.0,
                                "hoursDemandedRating" => 5.0
                            ),
                            array(
                                "name" => "PHYS 221",
                                "creditHours" => 3,
                                "difficultyRating" => 5.0,
                                "hoursDemandedRating" => 4.0
                            )
                        )
                    )
                )
            ),
            "followingSemesters" => array(
                array(
                    "semester" => "Spring",
                    "year" => 2017,
                    "classes" => array(
                        array(
                            "chosenClass" => array(
                                "name" => "MATH 201",
                                "creditHours" => 5,
                                "difficultyRating" => 5.0,
                                "hoursDemandedRating" => 4.5
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "MATH 201",
                                    "creditHours" => 5,
                                    "difficultyRating" => 5.0,
                                    "hoursDemandedRating" => 4.5
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "ENGL 102",
                                "creditHours" => 3,
                                "difficultyRating" => 3.5,
                                "hoursDemandedRating" => 3.0
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "ENGL 102",
                                    "creditHours" => 3,
                                    "difficultyRating" => 3.5,
                                    "hoursDemandedRating" => 3.0
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "CMPS 257",
                                "creditHours" => 3,
                                "difficultyRating" => 3.0,
                                "hoursDemandedRating" => 2.5
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "CMPS 257",
                                    "creditHours" => 3,
                                    "difficultyRating" => 3.0,
                                    "hoursDemandedRating" => 2.5
                                ),
                                array(
                                    "name" => "MATH 223",
                                    "creditHours" => 3,
                                    "difficultyRating" => 3.5,
                                    "hoursDemandedRating" => 3.5
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "CMPS 280",
                                "creditHours" => 3,
                                "difficultyRating" => 4.0,
                                "hoursDemandedRating" => 4,5
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "CMPS 280",
                                    "creditHours" => 3,
                                    "difficultyRating" => 4.0,
                                    "hoursDemandedRating" => 4,5
                                )
                            )
                        )
                    )
                )
            )
        );
    }
}