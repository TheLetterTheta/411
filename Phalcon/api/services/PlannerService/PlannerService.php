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
    private $plannedSemester;

    public function __construct()
    {
        $this->di = DI::getDefault();
        $this->headerClasses = array();
        $this->plannedSemester = array(
            array(
                'id' =>1,
                'sequence'=>'0',
                'name'=>'Spring 2016',
                'classes'=>array(),
                'semesterType'=>'sp'
            ),array(
                'id' =>2,
                'sequence'=>'1',
                'name'=>'Fall 2016',
                'classes'=>array(),
                'semesterType'=>'fa'
            ),array(
                'id' =>3,
                'sequence'=>'2',
                'name'=>'Spring 2017',
                'classes'=>array(),
                'semesterType'=>'sp'
            )
        );
    }

    public function createPlanner()
    {
        $response = $this->di["dataClassService"]->GetClasses();
        $this->remainingClasses = $this->modifyClassesArray($response);
        $this->generateHeaderClasses();
        if(is_array($this->headerClasses) || is_object($this->headerClasses)) {
            foreach ($this->headerClasses as $class) {
                $this->calculateSemestersTillCompletion($class, -1);
            }
        }
        usort($this->remainingClasses, function($a, $b){
            return $b['postRequisites'] <=> $a['postRequisites'];
        });
        array_push($this->plannedSemester[0], $this->remainingClasses[0]);
        array_push($this->plannedSemester[0][0], $this->remainingClasses[1]);
        echo json_encode($this->remainingClasses);
        while(empty($this->remainingClasses))
        {
            foreach ($this->remainingClasses as $class)
            {

            }
        }
    }

    private function modifyClassesArray(&$response)
    {
        //echo $classList;
        //breaks at at foreach 32 and  at 42
        if(is_array($response)  || is_object($response)) {
            foreach ($response as &$class) {
                //echo(json_encode($class));
                $class['postRequisites'] = -1;
                $class['isPlanned'] = false;
            }
        }
        return $response;
    }

    private function generateHeaderClasses()
    {
        $this->headerClasses = array_keys($this->remainingClasses);
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
                            if (strtoupper($this->remainingClasses[$value]['shortName'] . ' ' . $this->remainingClasses[$value]['classNumber']) == strtoupper($prerequisite['value'])) {
                                unset($this->headerClasses[$key]);
                                break;
                            }
                        }
                    }
                }
            }
        }
    }

    private function calculateSemestersTillCompletion($classKeyPosition, $previousDepth)
    {
        if($this->remainingClasses[$classKeyPosition]['postRequisites'] < $previousDepth + 1) {
            $this->remainingClasses[$classKeyPosition]['postRequisites'] = $previousDepth + 1;
        }
        foreach ($this->remainingClasses[$classKeyPosition]['prerequisites'] as $andLayer) {
            foreach ($andLayer as $prerequisite) {
                if ($prerequisite['type'] == 'class') {
                    foreach ($this->remainingClasses as $key => $value) {
                        if (strtoupper($value['shortName'] . ' ' . $value['classNumber']) == strtoupper($prerequisite['value'])) {
                            if ($value['postRequisites'] < $previousDepth + 1) {
                                $this->calculateSemestersTillCompletion($key, $previousDepth + 1);
                            }
                            break;
                        }
                    }
                }
            }
        }
    }


}