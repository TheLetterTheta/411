<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/12/2016
 * Time: 22:04 PM
 */
class ClassPrerequisite
{
    public $ClassId;
    public $PrevClassId;

    function __construct(array $dataRow = null)
    {
        if($dataRow != null){
            $this->ClassId = $dataRow["ClassId"];
            $this->PrevClassId = $dataRow["PrevClassId"];
        }
    }
}