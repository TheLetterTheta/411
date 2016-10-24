<?php

use Phalcon\Di;
/**
 * Created by PhpStorm.
 * User: ThatGuyJustNow
 * Date: 10/19/2016
 * Time: 10:55 PM
 */
class PlannerService implements IPlannerService
{
    private $di;
    private $remainingClasses;
    private $headerClasses;

    public function __construct()
    {
        $this->di = DI::getDefault();
    }

    public function createPlanner()
    {
        $response = $this->di["dataClassService"]->GetClasses();
        $this->remainingClasses = $this->modifyClassesArray($response);
        $this->generateHeaderClasses();
        if(is_array($this->headerClasses) || is_object($this->headerClasses)) {
            foreach ($this->headerClasses as &$class) {
                $class['earliestSemester'] = $this->calculateSemestersTillCompletion($class);
            }
        }
        echo json_encode($this->remainingClasses);

    }

    private function modifyClassesArray(&$response)
    {
        //echo $classList;
        //breaks at at foreach 32 and  at 42
        if(is_array($response)  || is_object($response)) {
            foreach ($response as &$class) {
                //echo(json_encode($class));
                $class['earliestSemester'] = 0;
                $class['isPlanned'] = false;
            }
        }
        else{
            echo('no array given');
        }
        return $response;
    }

    private function generateHeaderClasses()
    {
        $this->headerClasses = $this->remainingClasses;
        if(! (is_array($this->remainingClasses) || is_object($this->remainingClasses))) return;
        foreach ($this->remainingClasses as $class) {
            $prerequisites = $class['prerequisites'];
            if(empty($prerequisites)){
                continue;
            }
            foreach ($prerequisites as $andLayer) {
                foreach ($andLayer as $prerequisite) {
                    if ($prerequisite['type'] == 'class') {
                        foreach ($this->headerClasses as $key => $value) {
                            if (strtoupper($value['shortName'] . ' ' . $value['classNumber']) == strtoupper($prerequisite['value'])) {
                                unset($this->headerClasses[$key]);
                                break;
                            }
                        }
                    }
                }
            }
        }
    }

    private function calculateSemestersTillCompletion(&$class)
    {
        if(empty($class['prerequisites'])){
            $class['earliestSemester'] = 0;
            return 0;
        }
        $maxChildren = 0;
        foreach ($class['prerequisites'] as $andLayer) {
            foreach ($andLayer as $prerequisite) {
                if ($prerequisite['type'] == 'class') {
                    foreach ($this->remainingClasses as $key => $value) {
                        if (strtoupper($value['shortName'] . ' ' . $value['classNumber']) == strtoupper($prerequisite['value'])) {
                            if($value['earliestSemester'] > 0){
                                $semesters = $value['earliestSemester'];
                            }
                            else {
                                $semesters = $this->calculateSemestersTillCompletion($this->remainingClasses[$key]);
                            }
                            if ($semesters > $maxChildren) {
                                $maxChildren = $semesters;
                            }
                            break;
                        }
                    }
                }
            }
        }
        $class['earliestSemester'] = 1 + $maxChildren;
        return $class['earliestSemester'];
    }
}