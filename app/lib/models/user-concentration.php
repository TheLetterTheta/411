<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/12/2016
 * Time: 22:20 PM
 */
class UserConcentration
{
    public $ConcentrationId;
    public $UserId;
    public $StartDate;

    function __construct(array $dataRow = null)
    {
        if($dataRow != null){
            $this->ConcentrationId = $dataRow["ConcentrationId"];
            $this->UserId = $dataRow["UserId"];
            $this->StartDate = $dataRow["StartDate"];
        }
    }
}