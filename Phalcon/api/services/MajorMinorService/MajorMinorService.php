<?php

use Phalcon\Di;

class MajorMinorService implements IMajorMinorService
{
    private $di;
    public function __construct()
    {
        $this->di = DI::getDefault();
    }

    public function getMajors($userId)
    {
     return $this->di["dataMajorMinorService"]->getMajors($userId);
    }

    public function getMinors($userId)
    {
        return $this->di["dataMajorMinorService"]->getMinors($userId);
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