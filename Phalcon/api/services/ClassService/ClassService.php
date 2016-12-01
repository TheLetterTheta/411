<?php

use Phalcon\Di;

class ClassService implements IClassService
{
    private $di;
    public function __construct()
    {
        $this->di = DI::getDefault();
    }

    public function getClasses()
    {
        return $this->di["dataClassService"]->getClasses();
    }

    public function getClassById($classId)
    {
        return $this->di["dataClassService"]->getClassesById($classId);
    }

    public function getClassHistoryByUserId($userId)
    {
        return $this->di["dataClassService"]->getClassHistoryByUserId($userId);
    }
}