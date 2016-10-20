<?php

use Phalcon\Di;

class MajorMinorService implements IMajorMinorService
{
    private $di;
    public function __construct()
    {
        $this->di = DI::getDefault();
    }

    public function getMajors()
    {
     return $this->di["dataMajorMinorService"]->getMajors();
    }

    public function getMinors()
    {
        return $this->di["dataMajorMinorService"]->getMinors();
    }

    public function getUserMajors($userId)
    {
        return $this->di["dataMajorMinorService"]->getUserMajors($userId);
    }
    public function getUserMinors($userId)
    {
        return $this->di["dataMajorMinorService"]->getUserMinors($userId);
    }
}