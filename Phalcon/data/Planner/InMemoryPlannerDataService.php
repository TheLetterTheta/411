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
            "upcomingSemester" => array(
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
                                "hoursDemandedRating" => 4.5
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "CMPS 280",
                                    "creditHours" => 3,
                                    "difficultyRating" => 4.0,
                                    "hoursDemandedRating" => 4.5
                                )
                            )
                        )
                    )
                ),
                array(
                    "semester" => "Fall",
                    "year" => 2017,
                    "classes" => array(
                        array(
                            "chosenClass" => array(
                                "name" => "CMPS 285",
                                "creditHours" => 3,
                                "difficultyRating" => 2.0,
                                "hoursDemandedRating" => 5.0
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "CMPS 285",
                                    "creditHours" => 3,
                                    "difficultyRating" => 2.0,
                                    "hoursDemandedRating" => 5.0
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "CMPS 290",
                                "creditHours" => 3,
                                "difficultyRating" => 2.5,
                                "hoursDemandedRating" => 2.0
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "CMPS 290",
                                    "creditHours" => 3,
                                    "difficultyRating" => 2.5,
                                    "hoursDemandedRating" => 2.0
                                ),
                                array(
                                    "name" => "CMPS 293",
                                    "creditHours" => 3,
                                    "difficultyRating" => 3.0,
                                    "hoursDemandedRating" => 2.5
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "COMM 211",
                                "creditHours" => 3,
                                "difficultyRating" => 3.0,
                                "hoursDemandedRating" => 1.5
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "COMM 211",
                                    "creditHours" => 3,
                                    "difficultyRating" => 3.0,
                                    "hoursDemandedRating" => 1.5
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "ECON 201",
                                "creditHours" => 3,
                                "difficultyRating" => 1.0,
                                "hoursDemandedRating" => 1.0
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "ECON 201",
                                    "creditHours" => 3,
                                    "difficultyRating" => 1.0,
                                    "hoursDemandedRating" => 1.0
                                ),
                                array(
                                    "name" => "ECON 202",
                                    "creditHours" => 3,
                                    "difficultyRating" => 2.0,
                                    "hoursDemandedRating" => 1.5
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "BIO 151",
                                "creditHours" => 3,
                                "difficultyRating" => 1.5,
                                "hoursDemandedRating" => 2.5
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "BIO 151",
                                    "creditHours" => 3,
                                    "difficultyRating" => 1.5,
                                    "hoursDemandedRating" => 2.5
                                ),
                                array(
                                    "name" => "PHYS 221",
                                    "creditHours" => 3,
                                    "difficultyRating" => 5.0,
                                    "hoursDemandedRating" => 4.5
                                ),
                                array(
                                    "name" => "CHEM 121",
                                    "creditHours" => 3,
                                    "difficultyRating" => 4.0,
                                    "hoursDemandedRating" => 5.0
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "BIOL 152",
                                "creditHours" => 1,
                                "difficultyRating" => 1.5,
                                "hoursDemandedRating" => 2.5
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "BIOL 152",
                                    "creditHours" => 1,
                                    "difficultyRating" => 1.5,
                                    "hoursDemandedRating" => 2.5
                                ),
                                array(
                                    "name" => "PLAB 222",
                                    "creditHours" => 1,
                                    "difficultyRating" => 5.0,
                                    "hoursDemandedRating" => 4.5
                                ),
                                array(
                                    "name" => "CLAB 123",
                                    "creditHours" => 1,
                                    "difficultyRating" => 4.0,
                                    "hoursDemandedRating" => 5.0
                                )
                            )
                        )
                    )
                ),
                array(
                    "semester" => "Spring",
                    "year" => 2018,
                    "classes" => array(
                        array(
                            "chosenClass" => array(
                                "name" => "CMPS 375",
                                "creditHours" => 3,
                                "difficultyRating" => 5.0,
                                "hoursDemandedRating" => 5.0
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "CMPS 375",
                                    "creditHours" => 3,
                                    "difficultyRating" => 5.0,
                                    "hoursDemandedRating" => 5.0
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "CMPS 390",
                                "creditHours" => 3,
                                "difficultyRating" => 3.0,
                                "hoursDemandedRating" => 4.0
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "CMPS 390",
                                    "creditHours" => 3,
                                    "difficultyRating" => 3.0,
                                    "hoursDemandedRating" => 4.0
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "PSYC 101",
                                "creditHours" => 3,
                                "difficultyRating" => 2.0,
                                "hoursDemandedRating" => 3.0
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "PSYC 101",
                                    "creditHours" => 3,
                                    "difficultyRating" => 2.0,
                                    "hoursDemandedRating" => 3.0
                                ),
                                array(
                                    "name" => "ANTH 101",
                                    "creditHours" => 3,
                                    "difficultyRating" => 2.0,
                                    "hoursDemandedRating" => 3.0
                                ),
                                array(
                                    "name" => "CRIM 101",
                                    "creditHours" => 3,
                                    "difficultyRating" => 2.0,
                                    "hoursDemandedRating" => 3.0
                                ),
                                array(
                                    "name" => "GEO 101",
                                    "creditHours" => 3,
                                    "difficultyRating" => 2.0,
                                    "hoursDemandedRating" => 3.0
                                ),
                                array(
                                    "name" => "PSCI 101",
                                    "creditHours" => 3,
                                    "difficultyRating" => 2.0,
                                    "hoursDemandedRating" => 3.0
                                ),
                                array(
                                    "name" => "SOCI 101",
                                    "creditHours" => 3,
                                    "difficultyRating" => 2.0,
                                    "hoursDemandedRating" => 3.0
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "ENGL 231",
                                "creditHours" => 3,
                                "difficultyRating" => 2.5,
                                "hoursDemandedRating" => 3.5
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "ENGL  231",
                                    "creditHours" => 3,
                                    "difficultyRating" => 2.5,
                                    "hoursDemandedRating" => 3.5
                                ),
                                array(
                                    "name" => "ENGL  230",
                                    "creditHours" => 3,
                                    "difficultyRating" => 3.5,
                                    "hoursDemandedRating" => 2.5
                                ),
                                array(
                                    "name" => "ENGL  232",
                                    "creditHours" => 3,
                                    "difficultyRating" => 4.5,
                                    "hoursDemandedRating" => 1.5
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "BIO 153",
                                "creditHours" => 3,
                                "difficultyRating" => 1.5,
                                "hoursDemandedRating" => 2.5
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "BIO 153",
                                    "creditHours" => 3,
                                    "difficultyRating" => 1.5,
                                    "hoursDemandedRating" => 2.5
                                ),
                                array(
                                    "name" => "PHYS 223",
                                    "creditHours" => 3,
                                    "difficultyRating" => 5.0,
                                    "hoursDemandedRating" => 4.5
                                ),
                                array(
                                    "name" => "CHEM 123",
                                    "creditHours" => 3,
                                    "difficultyRating" => 4.0,
                                    "hoursDemandedRating" => 5.0
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "BIOL 154",
                                "creditHours" => 1,
                                "difficultyRating" => 1.5,
                                "hoursDemandedRating" => 2.5
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "BIOL 154",
                                    "creditHours" => 1,
                                    "difficultyRating" => 1.5,
                                    "hoursDemandedRating" => 2.5
                                ),
                                array(
                                    "name" => "PLAB 224",
                                    "creditHours" => 1,
                                    "difficultyRating" => 5.0,
                                    "hoursDemandedRating" => 4.5
                                ),
                                array(
                                    "name" => "CLAB 124",
                                    "creditHours" => 1,
                                    "difficultyRating" => 4.0,
                                    "hoursDemandedRating" => 5.0
                                )
                            )
                        )
                    )
                ),
                array(
                    "semester" => "Fall",
                    "year" => 2018,
                    "classes" => array(
                        array(
                            "chosenClass" => array(
                                "name" => "BIO 151",
                                "creditHours" => 3,
                                "difficultyRating" => 1.5,
                                "hoursDemandedRating" => 2.5
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "BIO 151",
                                    "creditHours" => 3,
                                    "difficultyRating" => 1.5,
                                    "hoursDemandedRating" => 2.5
                                ),
                                array(
                                    "name" => "PHYS 221",
                                    "creditHours" => 3,
                                    "difficultyRating" => 5.0,
                                    "hoursDemandedRating" => 4.5
                                ),
                                array(
                                    "name" => "CHEM 121",
                                    "creditHours" => 3,
                                    "difficultyRating" => 4.0,
                                    "hoursDemandedRating" => 5.0
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "CMPS 401",
                                "creditHours" => 3,
                                "difficultyRating" => 4.5,
                                "hoursDemandedRating" => 3.5
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "CMPS 401",
                                    "creditHours" => 3,
                                    "difficultyRating" => 4.5,
                                    "hoursDemandedRating" => 3.5
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "CMPS 447",
                                "creditHours" => 3,
                                "difficultyRating" => 4.5,
                                "hoursDemandedRating" => 3.5
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "Search Catalog (CMPS Elective)",
                                    "creditHours" => 3,
                                    "difficultyRating" => 4.5,
                                    "hoursDemandedRating" => 3.5
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "ENGL 322",
                                "creditHours" => 3,
                                "difficultyRating" => 2.5,
                                "hoursDemandedRating" => 2.5
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "ENGL 322",
                                    "creditHours" => 3,
                                    "difficultyRating" => 2.5,
                                    "hoursDemandedRating" => 2.5
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "MATH 380",
                                "creditHours" => 3,
                                "difficultyRating" => 4.5,
                                "hoursDemandedRating" => 3.5
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "MATH 380",
                                    "creditHours" => 3,
                                    "difficultyRating" => 4.5,
                                    "hoursDemandedRating" => 3.5
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "PHYS 221",
                                "creditHours" => 3,
                                "difficultyRating" => 5.0,
                                "hoursDemandedRating" => 4.5
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "BIO 151",
                                    "creditHours" => 3,
                                    "difficultyRating" => 1.5,
                                    "hoursDemandedRating" => 2.5
                                ),
                                array(
                                    "name" => "PHYS 221",
                                    "creditHours" => 3,
                                    "difficultyRating" => 5.0,
                                    "hoursDemandedRating" => 4.5
                                ),
                                array(
                                    "name" => "CHEM 121",
                                    "creditHours" => 3,
                                    "difficultyRating" => 4.0,
                                    "hoursDemandedRating" => 5.0
                                )
                            )
                        )
                    )
                ),
                array(
                    "semester" => "Spring",
                    "year" => 2019,
                    "classes" => array(
                        array(
                            "chosenClass" => array(
                                "name" => "CMPS 431",
                                "creditHours" => 3,
                                "difficultyRating" => 2.5,
                                "hoursDemandedRating" => 4.0
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "CMPS 431",
                                    "creditHours" => 3,
                                    "difficultyRating" => 2.5,
                                    "hoursDemandedRating" => 4.0
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "CMPS 383",
                                "creditHours" => 3,
                                "difficultyRating" => 2.5,
                                "hoursDemandedRating" => 5.0
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "See Catalog (CMPS Elective)",
                                    "creditHours" => 3,
                                    "difficultyRating" => 0.0,
                                    "hoursDemandedRating" => 0.0
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "MATH 350",
                                "creditHours" => 3,
                                "difficultyRating" => 4.5,
                                "hoursDemandedRating" => 5.0
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "MATH 350",
                                    "creditHours" => 3,
                                    "difficultyRating" => 4.5,
                                    "hoursDemandedRating" => 5.0
                                ),
                                array(
                                    "name" => "MATH 312",
                                    "creditHours" => 3,
                                    "difficultyRating" => 2.5,
                                    "hoursDemandedRating" => 3.0
                                ),
                                array(
                                    "name" => "MATH 360",
                                    "creditHours" => 3,
                                    "difficultyRating" => 3.5,
                                    "hoursDemandedRating" => 3.0
                                ),
                                array(
                                    "name" => "MATH 370",
                                    "creditHours" => 3,
                                    "difficultyRating" => 5.0,
                                    "hoursDemandedRating" => 5.0
                                ),
                                array(
                                    "name" => "MATH 410",
                                    "creditHours" => 3,
                                    "difficultyRating" => 1.5,
                                    "hoursDemandedRating" => 2.0
                                ),
                                array(
                                    "name" => "MATH 414",
                                    "creditHours" => 3,
                                    "difficultyRating" => 1.0,
                                    "hoursDemandedRating" => 1.0
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "MUS 151",
                                "creditHours" => 3,
                                "difficultyRating" => 2.5,
                                "hoursDemandedRating" => 3.0
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "MUS 151",
                                    "creditHours" => 3,
                                    "difficultyRating" => 2.5,
                                    "hoursDemandedRating" => 3.0
                                ),
                                array(
                                    "name" => "ART 151",
                                    "creditHours" => 3,
                                    "difficultyRating" => 2.5,
                                    "hoursDemandedRating" => 3.0
                                ),
                                array(
                                    "name" => "THEA 151",
                                    "creditHours" => 3,
                                    "difficultyRating" => 2.5,
                                    "hoursDemandedRating" => 3.0
                                ),
                                array(
                                    "name" => "DANC 151",
                                    "creditHours" => 3,
                                    "difficultyRating" => 2.5,
                                    "hoursDemandedRating" => 3.0
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "CMPS 415",
                                "creditHours" => 3,
                                "difficultyRating" => 2.5,
                                "hoursDemandedRating" => 4.0
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "CMPS 415",
                                    "creditHours" => 3,
                                    "difficultyRating" => 2.5,
                                    "hoursDemandedRating" => 4.0
                                )
                            )
                        )
                    )
                ),
                array(
                    "semester" => "Fall",
                    "year" => 2019,
                    "classes" => array(
                        array(
                            "chosenClass" => array(
                                "name" => "CMPS 391",
                                "creditHours" => 3,
                                "difficultyRating" => 2.5,
                                "hoursDemandedRating" => 4.0
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "CMPS 391",
                                    "creditHours" => 3,
                                    "difficultyRating" => 2.5,
                                    "hoursDemandedRating" => 4.0
                                ),
                                array(
                                    "name" => "MATH 392",
                                    "creditHours" => 3,
                                    "difficultyRating" => 2.5,
                                    "hoursDemandedRating" => 4.0
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "CMPS 411",
                                "creditHours" => 3,
                                "difficultyRating" => 2.5,
                                "hoursDemandedRating" => 4.0
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "CMPS 411",
                                    "creditHours" => 3,
                                    "difficultyRating" => 2.5,
                                    "hoursDemandedRating" => 4.0
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "MUS 111",
                                "creditHours" => 3,
                                "difficultyRating" => 5.0,
                                "hoursDemandedRating" => 5.0
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "See Catalog (Elective)",
                                    "creditHours" => 3,
                                    "difficultyRating" => 0.0,
                                    "hoursDemandedRating" => 0.0
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "LAT 101",
                                "creditHours" => 3,
                                "difficultyRating" => 2.0,
                                "hoursDemandedRating" => 2.0
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "See Catalog (Elective)",
                                    "creditHours" => 3,
                                    "difficultyRating" => 0.0,
                                    "hoursDemandedRating" => 0.0
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "PSYC 102",
                                "creditHours" => 3,
                                "difficultyRating" => 3.0,
                                "hoursDemandedRating" => 2.0
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "See Catalog (Elective)",
                                    "creditHours" => 3,
                                    "difficultyRating" => 0.0,
                                    "hoursDemandedRating" => 0.0
                                )
                            )
                        )
                    )
                ),
                array(
                    "semester" => "Spring",
                    "year" => 2020,
                    "classes" => array(
                        array(
                            "chosenClass" => array(
                                "name" => "CMPS 479",
                                "creditHours" => 3,
                                "difficultyRating" => 2.5,
                                "hoursDemandedRating" => 2.0
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "CMPS 479",
                                    "creditHours" => 3,
                                    "difficultyRating" => 2.5,
                                    "hoursDemandedRating" => 2.0
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "CMPS 482",
                                "creditHours" => 3,
                                "difficultyRating" => 2.5,
                                "hoursDemandedRating" => 2.0
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "CMPS 482",
                                    "creditHours" => 3,
                                    "difficultyRating" => 2.5,
                                    "hoursDemandedRating" => 2.0
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "MATH 360",
                                "creditHours" => 3,
                                "difficultyRating" => 3.5,
                                "hoursDemandedRating" => 3.0
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "MATH 350",
                                    "creditHours" => 3,
                                    "difficultyRating" => 4.5,
                                    "hoursDemandedRating" => 5.0
                                ),
                                array(
                                    "name" => "MATH 312",
                                    "creditHours" => 3,
                                    "difficultyRating" => 2.5,
                                    "hoursDemandedRating" => 3.0
                                ),
                                array(
                                    "name" => "MATH 360",
                                    "creditHours" => 3,
                                    "difficultyRating" => 3.5,
                                    "hoursDemandedRating" => 3.0
                                ),
                                array(
                                    "name" => "MATH 370",
                                    "creditHours" => 3,
                                    "difficultyRating" => 5.0,
                                    "hoursDemandedRating" => 5.0
                                ),
                                array(
                                    "name" => "MATH 410",
                                    "creditHours" => 3,
                                    "difficultyRating" => 1.5,
                                    "hoursDemandedRating" => 2.0
                                ),
                                array(
                                    "name" => "MATH 414",
                                    "creditHours" => 3,
                                    "difficultyRating" => 1.0,
                                    "hoursDemandedRating" => 1.0
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "CHEM 121",
                                "creditHours" => 3,
                                "difficultyRating" => 4.0,
                                "hoursDemandedRating" => 5.0
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "CHEM 121",
                                    "creditHours" => 3,
                                    "difficultyRating" => 1.5,
                                    "hoursDemandedRating" => 2.5
                                ),
                                array(
                                    "name" => "PHYS 221",
                                    "creditHours" => 3,
                                    "difficultyRating" => 5.0,
                                    "hoursDemandedRating" => 4.5
                                ),
                                array(
                                    "name" => "CHEM 121",
                                    "creditHours" => 3,
                                    "difficultyRating" => 4.0,
                                    "hoursDemandedRating" => 5.0
                                )
                            )
                        ),
                        array(
                            "chosenClass" => array(
                                "name" => "CLAB 123",
                                "creditHours" => 1,
                                "difficultyRating" => 4.0,
                                "hoursDemandedRating" => 5.0
                            ),
                            "classOptions" => array(
                                array(
                                    "name" => "BIOL 152",
                                    "creditHours" => 1,
                                    "difficultyRating" => 1.5,
                                    "hoursDemandedRating" => 2.5
                                ),
                                array(
                                    "name" => "PLAB 222",
                                    "creditHours" => 1,
                                    "difficultyRating" => 5.0,
                                    "hoursDemandedRating" => 4.5
                                ),
                                array(
                                    "name" => "CLAB 123",
                                    "creditHours" => 1,
                                    "difficultyRating" => 4.0,
                                    "hoursDemandedRating" => 5.0
                                )
                            )
                        )
                    )
                )
            )
        );
    }
}