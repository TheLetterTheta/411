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
    public function __construct()
    {
        $this->di = DI::getDefault();
    }

    public function createPlanner()
    {
        $response = $this->di["dataClassService"]->GetClasses();
        $remainingClasses = json_encode($response);
        $remainingClasses = $this->modifyClassesArray($remainingClasses);
        $headerClasses = $this->generateHeaderClasses($remainingClasses);
        //echo $remainingClasses;

    }

    private function modifyClassesArray($classList)
    {
        echo $classList;
        //breaks at at foreach 32 and  at 42
        foreach($classList as $class)
        {
            array_push($class, ['earliestSemester' => 0], ['isPlanned' => false]);
        }

        return $classList;
    }

    private function generateHeaderClasses($classList)
    {
        $headList = $classList;
        foreach($classList as $class)
        {
            $prerequisites = $class['prerequisites'];
            foreach($prerequisites as $andLayer)
            {
                foreach ($andLayer as $orLayer)
                {
                    foreach($orLayer as $prerequisite)
                    {
                        if($prerequisite['type'] == 'class')
                        {
                            $i = 0;
                            foreach($headList as $class)
                            {
                                if(($class['shortname'].' '.$class['classNumber']) == $prerequisite)
                                {
                                    unset($headList[i]);
                                }
                                $i++;
                            }
                        }
                    }
                }
            }
        }
        return $headList;
    }
}