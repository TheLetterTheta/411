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
    private $semesterHourThreshold;

    public function __construct()
    {
        $this->di = DI::getDefault();
        $this->semesterHourThreshold = 19;
        $this->headerClasses = array();
        $this->plannedSemester = array(
            array(
                'id' =>1,
                'ordinal' =>0,
                'classes'=>array(),
                'semesterType'=>'sp',
                'hours' => 0
            ),array(
                'id' =>2,
                'ordinal' =>1,
                'classes'=>array(),
                'semesterType'=>'fa',
                'hours' => 0
            ),array(
                'id' =>3,
                'ordinal' =>2,
                'classes'=>array(),
                'semesterType'=>'sp',
                'hours' => 0
            )
        );
    }

    public function getPlanner($userId){
        $planner = $this->di["plannerDataService"]->getPlanner($userId);
        return $planner;
        //if($planner["status"] == "success"){
            //$this->di["plannerDataService"]->formatPlanner($planner);
        //}
    }

    public function createPlanner($userId)
    {
        $majors=$this->di["dataMajorMinorService"]->getMajors($userId);
        $response = $this->di["dataClassService"]->GetClasses($userId);
        $classArray = array();
        foreach($majors[0]['catalog']['classes'] as $class)
        {
            foreach($response as $serviceClass)
            {
                if($serviceClass['id']==$class){
                    array_push($classArray,$serviceClass);
                }
            }
        }
        echo(json_encode($classArray));
        $this->remainingClasses = $this->modifyClassesArray($classArray);
        $this->generateHeaderClasses();
        echo json_encode($this->headerClasses);
        if(is_array($this->headerClasses) || is_object($this->headerClasses)) {
            foreach ($this->headerClasses as $class) {
                $this->calculateSemestersTillCompletion($class, -1);
            }
        }
        usort($this->remainingClasses, function($a, $b){
            return $b['postRequisites'] <=> $a['postRequisites'];
        });
        array_push($this->plannedSemester[0], $this->remainingClasses[0]);
        foreach($this->remainingClasses as $classKey => $class){
            foreach($this->plannedSemester as $semesterKey => $semester){
                if($this->canScheduleClass($class,$semester)){

                }
            }
        }
    }

    private function modifyClassesArray(&$response)
    {
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

    private function canScheduleClass($class, $semester)
    {
        if($semester->hours > $this->semesterHourThreshold){
            return false;
        }
        foreach($this->plannedSemester as $semesters)
        {
            foreach ($semesters['classes'] as $semesterClass)
            {
                if($semesterClass ==  $class)
                {
                    return false;
                }
            }
        }
    }
}