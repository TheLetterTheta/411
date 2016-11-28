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
    private $waitingList;

    public function __construct()
    {
        $this->di = DI::getDefault();
        $this->headerClasses = array();
        $this->waitingList = array();
        $this->plannedSemesters = array(
            array(
                'id' => 1,
                'ordinal' => 0,
                'year' => 2016,
                'classes'=>array(),
                'semesterType'=>'fa',
                'maxHours' => 19,
                'difficulty' => 0,
                'creditHours' => 0
            ),array(
                'id' => 2,
                'ordinal' => 1,
                'year' => 2016,
                'classes'=>array(),
                'semesterType'=>'sp',
                'maxHours' => 19,
                'difficulty' => 0,
                'creditHours' => 0
            ),array(
                'id' => 3,
                'ordinal' => 2,
                'year' => 2017,
                'classes'=>array(),
                'semesterType'=>'fa',
                'maxHours' => 19,
                'difficulty' => 0,
                'creditHours' => 0
            ),array(
                'id' => 4,
                'ordinal' => 3,
                'year' => 2017,
                'classes'=>array(),
                'semesterType'=>'sp',
                'maxHours' => 19,
                'difficulty' => 0,
                'creditHours' => 0
            ),array(
                'id' => 5,
                'ordinal' => 4,
                'year' => 2018,
                'classes'=>array(),
                'semesterType'=>'fa',
                'maxHours' => 19,
                'difficulty' => 0,
                'creditHours' => 0
            ),array(
                'id' => 6,
                'ordinal' => 5,
                'year' => 2018,
                'classes'=>array(),
                'semesterType'=>'sp',
                'maxHours' => 19,
                'difficulty' => 0,
                'creditHours' => 0
            ),array(
                'id' => 7,
                'ordinal' => 6,
                'year' => 2019,
                'classes'=>array(),
                'semesterType'=>'fa',
                'maxHours' => 19,
                'difficulty' => 0,
                'creditHours' => 0
            ),array(
                'id' => 8,
                'ordinal' => 7,
                'year' => 2019,
                'classes'=>array(),
                'semesterType'=>'sp',
                'maxHours' => 19,
                'difficulty' => 0,
                'creditHours' => 0
            )
        );
    }

    public function getPlanner($userId){
        $planner = $this->di["plannerDataService"]->getPlanner($userId);
        return $planner;
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
                $this->calculateMinimumHoursRequired($class);
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

        foreach($this->remainingClasses as $classKey => $class){
            //echo json_encode($class);
            $minDifficulty = -1;
            $minSemesterKey = null;
            //echo ':):):):):):):):):):):):):):):):):):):):):):):):):)';
            //echo json_encode(count($waitingList));
//            if(count($this->waitingList) != 0){
//                foreach($this->waitingList as $waitingKey => $waitingClass) {
//                    $minDifficulty = -1;
//                    $minSemesterKey = null;
//                    foreach ($this->plannedSemesters as $semesterKey => $semester) {
//                        if ($this->canScheduleClass($waitingClass, $semesterKey)) {
//                            //echo ':):):):):):):):):):):):):):):):):):):):):):):):):)';
//                            $coefficient = $this->howBadIsThisDecision($waitingClass, $semester);
//                            $chunk1 = (($waitingClass['creditHours'] * $waitingClass['difficultyRating'] * $waitingClass['hoursDemandedRating'] * $coefficient) ** (1 / 3)) * ($semester['difficulty'] ** count($semester['classes']));
//                            $chunk2 = 1 / (count($semester['classes']) + 1);
//
//                            $badDecision = (($chunk1) ** ($chunk2));
//
//                            if ($minDifficulty == -1 || $badDecision < $minDifficulty) {
//                                $minDifficulty = $badDecision;
//                                $minSemesterKey = $semesterKey;
//                            }
//                        }
//                    }
//                    if($minDifficulty !=  -1) {
//                        //echo 'I have been pushed!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!';
//                        array_push($this->plannedSemesters[$minSemesterKey]['classes'], $waitingClass);
//                        $this->plannedSemesters[$minSemesterKey]['creditHours'] += $waitingClass['creditHours'];
//                        if ($this->plannedSemesters[$minSemesterKey]['difficulty'] == 0) {
//                            $this->plannedSemesters[$minSemesterKey]['difficulty'] = ($waitingClass['creditHours'] * $waitingClass['difficultyRating'] * $waitingClass['hoursDemandedRating']) ** (1 / 3);
//                        } else {
//                            $chunkA = (($waitingClass['creditHours'] * $waitingClass['difficultyRating'] * $waitingClass['hoursDemandedRating']) ** (1 / 3)) * ($this->plannedSemesters[$minSemesterKey]['difficulty'] ** count($this->plannedSemesters[$minSemesterKey]['classes'])) * ($this->plannedSemesters[$minSemesterKey]['creditHours']);
//                            $chunkB = 1 / (count($this->plannedSemesters[$minSemesterKey]['classes']) + 1);
//                            $this->plannedSemesters[$minSemesterKey]['difficulty'] = ($chunkA) ** ($chunkB);
//                        }
//                        unset($this->waitingList[$waitingKey]);
//                        break;
//                    }
//                }
//            }

            if($minDifficulty == -1) {
                foreach ($this->plannedSemesters as $semesterKey => $semester) {
                    if ($this->canScheduleClass($class, $semesterKey)) {
                        $coefficient = $this->howBadIsThisDecision($class, $semester);
                        $chunk1 = (($class['creditHours'] * $class['difficultyRating'] * $class['hoursDemandedRating'] * $coefficient) ** (1 / 3)) * ($semester['difficulty'] ** count($semester['classes']));
                        $chunk2 = 1 / (count($semester['classes']) + 1);

                        $badDecision = (($chunk1) ** ($chunk2));

                        if ($minDifficulty == -1 || $badDecision < $minDifficulty) {
                            $minDifficulty = $badDecision;
                            $minSemesterKey = $semesterKey;
                        }
                    }
//                    if ($this->canScheduleClass($this->waitingList[0], $semesterKey)) {
//                        $coefficient = $this->howBadIsThisDecision($this->waitingList[0], $semester);
//                        $chunk1 = (($class['creditHours'] * $class['difficultyRating'] * $class['hoursDemandedRating'] * $coefficient) ** (1 / 3)) * ($semester['difficulty'] ** count($semester['classes']));
//                        $chunk2 = 1 / (count($semester['classes']) + 1);
//
//                        $badDecision = (($chunk1) ** ($chunk2));
//
//                        if ($minDifficulty == -1 || $badDecision < $minDifficulty) {
//                            $minDifficulty = $badDecision;
//                            $minSemesterKey = $semesterKey;
//                        }
//                    }

                }
            }

            if($minDifficulty == -1){
                if($class['minHoursRequired'] != 0){
                    //echo '-------------I Got Got!----------';
                    foreach($this->plannedSemesters as $semesterTKey  => $semesterT){
                        if($semesterT['ordinal'] + $class['postRequisites']  == end($this->plannedSemesters)['ordinal']){
                            $minSemesterKey = $semesterTKey;
                        }
                    }
                    //array_push($waitingList, $class);
                    //continue;
                }
                else{
                    echo 'ERROR! INSUFFICIENT SEMSERS';
                    return 'ERROR! INSUFFICIENT SEMESTERS';
                }
            }
            //echo 'Regular Class: ';
            //echo json_encode($class);
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

        foreach ($this->remainingClasses[$classKeyPosition]['prerequisites'] as $andLayer) {
            foreach ($andLayer as $prerequisite) {
                if ($prerequisite['type'] == 'class') {
                    foreach ($this->remainingClasses as $key => $value) {
                        if (strtoupper($value['shortName'] . ' ' . $value['classNumber']) == strtoupper($prerequisite['value'])) {
                            if ($value['postRequisites'] <= $previousDepth + 1) {
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

    private function calculateMinimumHoursRequired($classKeyPosition)
    {
        $hours = $this->remainingClasses[$classKeyPosition]['minHoursRequired'];
        foreach ($this->remainingClasses[$classKeyPosition]['prerequisites'] as $andLayer) {
            foreach ($andLayer as $prerequisite) {
                if ($prerequisite['type'] == 'class') {
                    foreach ($this->remainingClasses as $key => $value) {
                        if (strtoupper($value['shortName'] . ' ' . $value['classNumber']) == strtoupper($prerequisite['value'])) {
                            $newHours = $this->calculateMinimumHoursRequired($key);
                            if($newHours > $hours){
                                $hours = $newHours;
                            }
                            break;
                        }
                    }
                }
            }
        }
        $this->remainingClasses[$classKeyPosition]['minHoursRequired'] = $hours;
        return $hours;
    }



    private function canScheduleClass($class, $semesterKey)
    {
        if(!in_array($this->plannedSemesters[$semesterKey]['semesterType'] ,$class['semester'])
            || $this->plannedSemesters[$semesterKey]['creditHours'] + $class['creditHours'] > $this->plannedSemesters[$semesterKey]['maxHours']){
            return false;
        }

        if($this->plannedSemesters[$semesterKey]['ordinal'] + $class['postRequisites'] > count($this->plannedSemesters)){
            return false;
        }

        $hours = 0;
        foreach($this->plannedSemesters  as  $semester){
            if($this->plannedSemesters[$semesterKey]['ordinal'] > $semester['ordinal']){
                $hours += $semester['creditHours'];
            }
        }

        if($hours < $class['minHoursRequired']){
            return false;
        }

        $prerequisites = $class['prerequisites'];
        if(empty($prerequisites)){
            return true;
        }

        //Prerequisites to check

        foreach ($prerequisites as $andLayer) {
            foreach ($andLayer as $prerequisite) {
                //echo json_encode($prerequisite);
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
                else if ($prerequisite['type'] == 'minPriorHours'){
                    $hourSum = 0;
                    foreach($this->plannedSemesters as $semester){
                        if($semester['ordinal'] > $this->plannedSemesters[$semesterKey]['ordinal']){
                            $hourSum += $semester['creditHours'];
                        }
                    }
                    if($hourSum < $prerequisite['value']){
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