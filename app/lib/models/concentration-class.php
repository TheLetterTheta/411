<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/12/2016
 * Time: 22:11 PM
 */
class ConcentrationClass
{
    public $ClassId;
    public $ConcentrationId;

    function __construct(array $dataRow = null)
    {
        if($dataRow != null){
            $this->ClassId = $dataRow["ClassId"];
            $this->ConcentrationId = $dataRow["ConcentrationId"];
        }
    }
}