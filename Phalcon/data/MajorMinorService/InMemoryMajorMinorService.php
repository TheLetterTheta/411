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
            'progress' => 67
        ),array(
            'id' => 2,
            'name' => 'Math',
            'description' =>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vestibulum, felis id volutpat sollicitudin, quam odio ultrices nisi, eget viverra est eros vel ante.",
            'progress' => 60
        ));
        $this->minors = array(
            array(
                'id' => 1,
                'name' => 'English',
                'description' =>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vestibulum, felis id volutpat sollicitudin, quam odio ultrices nisi, eget viverra est eros vel ante.",
                'progress' => 10
            )
        );
        $this->userMajors = array(
            'userId' => 1,
            $this->majors[1]
        );
        $this->userMinors = array(
            'userId' => 1,
            $this->minors[0]
        );
    }

    public function getMajors()
    {
        return $this->majors;
    }

    public function getMinors()
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