<?php

/**
 * Created by PhpStorm.
 * User: ThatGuyJustNow
 * Date: 10/19/2016
 * Time: 10:55 PM
 */
class PlannerService
{
    public function createPlanner($userId)
    {
        echo FUNCTIONS::DATA_API_URL().'/class/classes';
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => FUNCTIONS::DATA_API_URL().'/class/classes',
        ));
        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        // Close request to clear up some resources
        curl_close($curl);
        $remainingClasses = $resp;
        $remainingClasses = $this->modifyClassesArray($remainingClasses);
        $headerClasses = $this->generateHeaderClasses($remainingClasses);


    }

    private function modifyClassesArray($classList)
    {
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