<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 10/19/2016
 * Time: 18:31 PM
 */
class InMemoryMajorMinorService implements IMajorMinorDataService
{
    private $majors;
    private $minors;
    private $userMajors;
    private $userMinors;

    public function __construct(){
        $this->majors= array(array(
            'id' => 1,
            'name' => 'Computer Science',
            'description' =>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vestibulum, felis id volutpat sollicitudin, quam odio ultrices nisi, eget viverra est eros vel ante.",
            'progress' => 67,
            'catalog' => array(
                'classes' => array(27,28,30,29,56,58,57,59,60,62,64,41,44,43,42,45,46,47,51,49,1,4,5,17,18,70,7,9,10,12,14,15,16,79,20,21,22,23,24,6,26)
            )
        ),array(
            'id' => 2,
            'name' => 'Math',
            'description' =>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vestibulum, felis id volutpat sollicitudin, quam odio ultrices nisi, eget viverra est eros vel ante.",
            'progress' => 60
        ));
        $this->minors = array(
            array(
                'id' => 3,
                'name' => 'English',
                'description' =>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vestibulum, felis id volutpat sollicitudin, quam odio ultrices nisi, eget viverra est eros vel ante.",
                'progress' => 10
            )
        );
        $this->userMajors = array(
            'userId' => 1,
            'majors' => $this->majors[1]
        );
        $this->userMinors = array(
            'userId' => 1,
            'minors' => $this->minors[0]
        );
    }

    public function getMajors($userId)
    {
        return $this->majors;
    }

    public function getMinors($userId)
    {
        return $this->minors;
    }

    public function getUserMajors($userId)
    {
        return $this->userMajors;
    }
    public function getUserMinors($userId)
    {
        return $this->userMinors;
    }
}