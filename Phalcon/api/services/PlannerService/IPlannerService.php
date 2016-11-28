<?php

/**
 * Created by PhpStorm.
 * User: ThatGuyJustNow
 * Date: 10/20/2016
 * Time: 2:05 AM
 */
interface IPlannerService
{
    public function createPlanner($userId);

    public function getPlanner($userId);
}