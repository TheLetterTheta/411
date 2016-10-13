<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 10/12/2016
 * Time: 17:31 PM
 */
class InMemoryMajorService implements IMajorService
{
    private $_majors =
<<<Majors
[
    {
        id: 1,
        title: "Math",
        catalogYear: 2016,
        description: "A very technical degree involving lots of math and other things",
        progress: 51
    },
    {
        id: 2,
        title: "English",
        catalogYear: 2016,
        description: "A very technical degree involving lots of english and other things",
        progress: 95
    },
    {
        id: 3,
        title: "Computer Science",
        catalogYear: 2016,
        description: "A very technical degree involving lots of computers and other things",
        progress: 74
    },
    {
        id: 4,
        title: "Physics",
        catalogYear: 2016,
        description: "A very technical degree involving lots of physics and other things",
        progress: 80
    },
    {
        id: 5,
        title: "Chemistry",
        catalogYear: 2016,
        description: "A very technical degree involving lots of chemistry and other things",
        progress: 30
    },
    {
        id: 6,
        title: "Biology",
        catalogYear: 2016,
        description: "A very technical degree involving lots of biology and other things",
        progress: 10
    },
    {
        id: 7,
        title: "Music",
        catalogYear: 2016,
        description: "A very technical degree involving lots of music and other things",
        progress: 85
    },
    {
        id: 8,
        title: "History",
        catalogYear: 2016,
        description: "A very technical degree involving lots of history and other things",
        progress: 0
    }
]
Majors;
    private $_minors =
<<<Minors
[
    {
        id: 1,
        title: "Math",
        catalogYear: 2016,
        description: "A somewhat technical thing involving a little math",
        progress: 51
    },
    {
        id: 2,
        title: "English",
        catalogYear: 2016,
        description: "A somewhat technical thing involving a little english",
        progress: 95
    },
    {
        id: 3,
        title: "Computer Science",
        catalogYear: 2016,
        description: "A somewhat technical thing involving a little computers",
        progress: 74
    },
    {
        id: 4,
        title: "Physics",
        catalogYear: 2016,
        description: "A somewhat technical thing involving a little physics",
        progress: 80
    },
    {
        id: 5,
        title: "Chemistry",
        catalogYear: 2016,
        description: "A somewhat technical thing involving a little chemistry",
        progress: 30
    },
    {
        id: 6,
        title: "Biology",
        catalogYear: 2016,
        description: "A somewhat technical thing involving a little biology",
        progress: 10
    },
    {
        id: 7,
        title: "Music",
        catalogYear: 2016,
        description: "A somewhat technical thing involving a little music",
        progress: 85
    },
    {
        id: 8,
        title: "History",
        catalogYear: 2016,
        description: "A somewhat technical thing involving a little history",
        progress: 0
    }
]
Minors;



    public function GetMajors()
    {
        $majors = json_decode($this->_majors);
        return $majors;
    }

    public function GetMinors()
    {
        $minors = json_decode($this->_minors);
        return $minors;
    }

    public function GetMajorsByUserId($userId)
    {
        $majors = json_decode($this->_majors);
        $userMajors = [];
        for($i = 0; $i < count($majors); $i += 2){
            array_push($userMajors, $majors[$i]);
        }
        return $userMajors;
    }

    public function GetMinorsByUserId($userId)
    {
        $minors = json_decode($this->_minors);
        $userMinors = [];
        for($i = 0; $i < count($minors); $i += 2){
            array_push($userMinors, $minors[$i]);
        }
        return $userMinors;
    }

    public function SetMajors($newMajors, $userId)
    {
        // TODO: Implement SetMajors() method.
    }

    public function SetMinors($newMinors, $userId)
    {
        // TODO: Implement SetMinors() method.
    }
}