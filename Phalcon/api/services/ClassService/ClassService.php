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
        return $this->di["dataClassService"]->GetClasses();
    }

    public function getClassById($classId)
    {
        return $this->di["dataClassService"]->GetClassesById($classId);
    }
}