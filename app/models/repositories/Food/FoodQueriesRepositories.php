<?php

namespace Repositories\Food;

use Illuminate\Support\Facades\DB;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class FoodQueriesRepositories {

    public $list = [['1', '3', '5', '10'], [3, 4],[5,7]];
    public $nameOfMeal;

    public function __construct(array $list) {
        $this->list ;
    }

    public function setName($nameOfMeal) {
        $this->nameOfMeal = $nameOfMeal;
    }

    public function getName() {
        return $this->nameOfMeal;
    }

    public function getList($nameOfMeal) {
        if($nameOfMeal== 'breakfast'){
            $listBreakfast= [$this->list[0],$this->list[1]];
        return $listBreakfast;    
        } else {
        return "ddd";    
        }
        
    }

    public function searchLimit($idFoodSubgroup) {
        $findLimit = DB::table('FD_SUBGROUP')->select('limit')->where('id', $idFoodSubgroup)->first();
        return $limit = $findLimit->limit;
    }

    public function generalFoodQuery($limit, $subCategory, $calories, $divideCalories) {
        $query = DB::select("SELECT food.NDB_No, ABBREV.Energ_Kcal, food.FdSubgrp_id,food.Shrt_Desc,( @cumSum:= @cumSum + ABBREV.Energ_Kcal)  AS CumSum
        FROM food
        LEFT JOIN ABBREV ON ABBREV.NDB_No = food.NDB_No
        LEFT JOIN FD_GROUP ON FD_GROUP.FdGrp_CD = food.FdGrp_Cd
        LEFT JOIN FD_SUBGROUP ON FD_GROUP.FdGrp_CD = FD_SUBGROUP.FdGrp_Cd
        JOIN (select @cumSum := $calories) B
        WHERE @cumSum <  $divideCalories
        AND
        (food.FdSubgrp_id = $subCategory)

        AND food.NDB_No >= ROUND(RAND()*(SELECT MAX(NDB_No) FROM food WHERE food.FdSubgrp_id = $subCategory))
        LIMIT $limit");
        $runningSum = 0;
        foreach ($query as $q) {
            $q->meal_time_id = 1;
            $runningSum += $q->Energ_Kcal;
            $calories = $runningSum;
        }

        return $query;
    }

    function has_next(array $array) {
        return next($array) !== false ?: key($array) !== null;
    }

    function shuffle_assoc($list) {
        if (shuffle($list)) {
            return $list;
        } else {
            return $list;
        }
    }

    function getTheLastFood($array) {
        return end($array);
    }

}
