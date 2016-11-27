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
    private $plannedSemesters;
    private $semesterHourThreshold;

    public function __construct()
    {
        $this->di = DI::getDefault();
        $this->semesterHourThreshold = 19;
        $this->headerClasses = array();
        $this->plannedSemesters = array(
            array(
                'id' => 1,
                'ordinal' => 0,
                'year' => 2016,
                'classes'=>array(),
                'semesterType'=>'sp',
                'maxHours' => 19,
                'difficulty' => 0,
                'creditHours' => 0
            ),array(
                'id' => 2,
                'ordinal' => 1,
                'year' => 2016,
                'classes'=>array(),
                'semesterType'=>'fa',
                'maxHours' => 19,
                'difficulty' => 0,
                'creditHours' => 0
            ),array(
                'id' => 3,
                'ordinal' => 2,
                'year' => 2017,
                'classes'=>array(),
                'semesterType'=>'sp',
                'maxHours' => 19,
                'difficulty' => 0,
                'creditHours' => 0
            ),array(
                'id' => 4,
                'ordinal' => 3,
                'year' => 2017,
                'classes'=>array(),
                'semesterType'=>'fa',
                'maxHours' => 19,
                'difficulty' => 0,
                'creditHours' => 0
            ),array(
                'id' => 5,
                'ordinal' => 4,
                'year' => 2018,
                'classes'=>array(),
                'semesterType'=>'sp',
                'maxHours' => 19,
                'difficulty' => 0,
                'creditHours' => 0
            ),array(
                'id' => 6,
                'ordinal' => 5,
                'year' => 2018,
                'classes'=>array(),
                'semesterType'=>'fa',
                'maxHours' => 19,
                'difficulty' => 0,
                'creditHours' => 0
            ),array(
                'id' => 7,
                'ordinal' => 6,
                'year' => 2019,
                'classes'=>array(),
                'semesterType'=>'sp',
                'maxHours' => 19,
                'difficulty' => 0,
                'creditHours' => 0
            ),array(
                'id' => 8,
                'ordinal' => 7,
                'year' => 2019,
                'classes'=>array(),
                'semesterType'=>'fa',
                'maxHours' => 19,
                'difficulty' => 0,
                'creditHours' => 0
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

        $this->remainingClasses = $this->modifyClassesArray($classArray);
        $this->generateHeaderClasses();
        if(is_array($this->headerClasses) || is_object($this->headerClasses)) {
            foreach ($this->headerClasses as $class) {
                $this->remainingClasses[$class]['postRequisites'] = 0;
                $this->calculateSemestersTillCompletion($class, -1);
            }
        }

        usort($this->remainingClasses, function($a, $b){
            if(($b['postRequisites'] <=> $a['postRequisites']) == 0){
                foreach ($b['prerequisites'] as $andLayer) {
                    foreach ($andLayer as $prerequisite) {
                        if ($prerequisite['type'] == 'class' && $prerequisite['isCorequisite']) {
                            return -1;
                        }
                        return 1;
                    }
                }
                return 1;
            }
            return $b['postRequisites'] <=> $a['postRequisites'];
        });

        //echo json_encode($this->remainingClasses);

        //cho json_encode($this->remainingClasses);
        foreach($this->remainingClasses as $classKey => $class){
            //echo json_encode($class);
            $minDifficulty = -1;
            $minSemesterKey = null;
            foreach($this->plannedSemesters as $semesterKey => $semester){
                if($this->canScheduleClass($class,$semesterKey)){
                    $coefficient = $this->howBadIsThisDecision($class, $semester);
                    $chunk1 = (($class['creditHours'] * $class['difficultyRating'] * $class['hoursDemandedRating'] * $coefficient)**(1/3)) * ($semester['difficulty']**count($semester['classes']));
                    $chunk2 =  1/(count($semester['classes'])+1);
                    if(($semester['creditHours']) != 0){
                        $badDecision = (($chunk1)**($chunk2)) * ($semester['creditHours']);
                    }
                    $badDecision = (($chunk1)**($chunk2));
                    //echo ('badDecision = ' . $badDecision);
                    if($minDifficulty == -1 || $badDecision < $minDifficulty){
                        $minDifficulty = $badDecision;
                        $minSemesterKey = $semesterKey;
                    }
                }
            }

            if($minDifficulty == -1 && $minSemesterKey == null){
                return 'ERROR! INSUFFICIENT SEMESTERS';
            }

            array_push($this->plannedSemesters[$minSemesterKey]['classes'], $class);
            $this->plannedSemesters[$minSemesterKey]['creditHours'] += $class['creditHours'];
            if($this->plannedSemesters[$minSemesterKey]['difficulty'] == 0){
                $this->plannedSemesters[$minSemesterKey]['difficulty'] = ($class['creditHours'] * $class['difficultyRating'] * $class['hoursDemandedRating'])**(1/3);
            }
            else{
                $chunkA = (($class['creditHours'] * $class['difficultyRating'] * $class['hoursDemandedRating'])**(1/3)) * ($this->plannedSemesters[$minSemesterKey]['difficulty']**count($this->plannedSemesters[$minSemesterKey]['classes']))  * ($this->plannedSemesters[$minSemesterKey]['creditHours']);
                $chunkB =  1/(count($this->plannedSemesters[$minSemesterKey]['classes'])+1);
                $this->plannedSemesters[$minSemesterKey]['difficulty'] = ($chunkA)**($chunkB);
            }
            //echo($this->plannedSemesters[$minSemesterKey]['ordinal'] . ' ' . 'plannedSemesterDifficulty = ' . $this->plannedSemesters[$minSemesterKey]['difficulty'] . '////////////////////////////////////////////////////////////');
        }

        echo json_encode($this->plannedSemesters);
    }

    private function modifyClassesArray(&$response)
    {
        if(is_array($response)  || is_object($response)) {
            foreach ($response as &$class) {
                $class['postRequisites'] = -1;
                $class['isPlanned'] = false;
            }
        }

        foreach($response as &$class){
            $prerequisites = &$class['prerequisites'];
            if(empty($prerequisites)){
                continue;
            }
            foreach ($prerequisites as $andKey => &$andLayer) {
                foreach ($andLayer as $prereqKey => $prerequisite) {
                    if ($prerequisite['type'] == 'class') {
                        $found = false;
                        foreach ($response as $value) {
                            if (strtoupper($value['shortName'] . ' ' . $value['classNumber']) == strtoupper($prerequisite['value'])) {
                                $found = true;
                                break;
                            }
                        }
                        if(!$found){
                            unset($andLayer[$prereqKey]);
                            if(empty($andLayer)){
                                unset($prerequisites[$andKey]);
                            }
                            break;
                        }
                    }
                }
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
        if($this->remainingClasses[$classKeyPosition]['shortName'] == 'SE'){
            $this->remainingClasses[$classKeyPosition]['postRequisites'] = count($this->plannedSemesters);
        }
        if($this->remainingClasses[$classKeyPosition]['postRequisites'] < $previousDepth + 1) {
            $this->remainingClasses[$classKeyPosition]['postRequisites'] = $previousDepth + 1;
        }
        //echo json_encode($this->remainingClasses[$classKeyPosition]) . ',';
        foreach ($this->remainingClasses[$classKeyPosition]['prerequisites'] as $andLayer) {
            foreach ($andLayer as $prerequisite) {
                if ($prerequisite['type'] == 'class') {
                    foreach ($this->remainingClasses as $key => $value) {
                        if (strtoupper($value['shortName'] . ' ' . $value['classNumber']) == strtoupper($prerequisite['value'])) {
                            //echo '--- FOUND! ---';
                            //echo json_encode($value) . ' ' . $previousDepth;
                            if ($value['postRequisites'] <= $previousDepth + 1) {
                                //echo '--- DIGGING ---';
                                if($prerequisite['isCorequisite']){
                                    $this->calculateSemestersTillCompletion($key, $previousDepth);
                                }
                                else{
                                    $this->calculateSemestersTillCompletion($key, $previousDepth + 1);
                                }
                            }
                            break;
                        }
                    }
                }
            }
        }
    }

    private function canScheduleClass($class, $semesterKey)
    {
        //echo json_encode($class);
        if($this->plannedSemesters[$semesterKey]['creditHours'] + $class['creditHours'] > $this->plannedSemesters[$semesterKey]['maxHours']){
            return false;
        }
        //Plenty of Credits

        $prerequisites = $class['prerequisites'];
        if(empty($prerequisites)){
            return true;
        }


        //Prerequisites to check

        foreach ($prerequisites as $andLayer) {
            foreach ($andLayer as $prerequisite) {
                if ($prerequisite['type'] == 'class') {
                    $found = false;
                    foreach($this->plannedSemesters as $semester){
                        if($prerequisite['isCorequisite']){
                            if ($semester['ordinal'] > $this->plannedSemesters[$semesterKey]['ordinal']){
                                continue;
                            }
                        }
                        else{
                            if ($semester['ordinal'] >= $this->plannedSemesters[$semesterKey]['ordinal']){
                                continue;
                            }
                        }
                        foreach ($semester['classes'] as $semesterClass) {
                            if(strtoupper($semesterClass['shortName'] . ' ' . $semesterClass['classNumber']) == strtoupper($prerequisite['value'])){
                                $found = true;
                                break;
                            }
                        }
                        if($found){
                            //Found the prerequisite
                            break;}
                    }
                    if(!$found){
                        //None of the prerequisites found
                        return false;
                    }
                }
            }
            //Everything checks out
            return true;
        }
    }

    private function howBadIsThisDecision($class, $semeser)
    {
        $m = $class['postRequisites'];
        $x = $semeser['ordinal'];
        //echo ('m = ' . $m . ' ');
        return (1/(2*$m+1)) * (($m+1)**($x**(2/ 1 + (count($this->plannedSemesters) - $m)))) + (2*$m/(2*$m+1));
    }
}