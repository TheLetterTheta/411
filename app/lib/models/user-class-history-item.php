<?php

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 6/12/2016
 * Time: 22:18 PM
 */
class UserClassHistoryItem
{
    public $ClassId;
    public $UserId;
    public $PercentGrade;
    public $Rating;
    public $Review;
    public $Status;
    public $TakenDate;

    function __construct(array $dataRow = null)
    {
        if($dataRow != null){
            $this->ClassId = $dataRow["ClassId"];
            $this->UserId = $dataRow["UserId"];
            $this->PercentGrade = $dataRow["PercentGrade"];
            $this->Rating = $dataRow["Rating"];
            $this->Review = $dataRow["Review"];
            $this->Status = $dataRow["Status"];
            $this->TakenDate = $dataRow["TakenDate"];
        }
    }
}