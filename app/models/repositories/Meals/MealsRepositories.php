<?php

namespace Repositories\Meals;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Braunson\FatSecret\FatSecret;
use App\models\entities\DietPlan;
use App\models\entities\AbbrevFood;
use App\models\entities\DietMeal;
use App\Models\Entities\DietDays;
use App\Models\Entities\DietWeeksPlan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DateTime;
use App\models\entities\UserAllergies;
use Repositories\Food\FoodQueriesRepositories;

class MealsRepositories {

    /**
     * Create and save to DB diet plan meals,days and weeks after the BMR calculation.
     * @param  int  $dietPlanType, $numberOfMeals
     * @return $dietPlanType saved in the Db
     */
    public function makePlan($dietPlanType, $numberOfMeals, $allergies) {


        $sessionCaloriesPerWeek = Session::get('result');
        $userId = Auth::user()->id;
        $weeks = sizeof($sessionCaloriesPerWeek);
        $daysFromWeeks = $weeks * 7;
        $endDate = date('Y-m-d', strtotime("+$daysFromWeeks day"));
        $saveDataPlan = new DietPlan();
        $saveDataPlan['diet_plan_type_id'] = $dietPlanType;
        $saveDataPlan['user_id'] = $userId;
        $saveDataPlan['start_date'] = date("Y-m-d");
        $saveDataPlan['end_date'] = $endDate;
        $saveDataPlan['weeks'] = sizeof($sessionCaloriesPerWeek);
        $dateModified = date('Y-m-d', strtotime("-1 day"));
        $date = new DateTime($dateModified);

        $saveDataPlan->save();
//        foreach ($allergies as $userAllergies) {
//            $userAllergiesFood = new UserAllergies();
//            $userAllergiesFood->user_id = $userId;
//            $userAllergiesFood->allergies_id = $userAllergies;
//            $userAllergiesFood->meal_plan_id = $saveDataPlan['id'];
//            $userAllergiesFood->save();
//        }
        $findWeekIds = [];
        foreach ($sessionCaloriesPerWeek as $key => $value) {
            $saveDataWeeksPlan = new DietWeeksPlan();
            $saveDataWeeksPlan->week_no = $key;
            $saveDataWeeksPlan->calories = $value;
            $saveDataWeeksPlan->dietPlan()->associate($saveDataPlan->id);
            $saveDataWeeksPlan->save();
        }
        $findWeekIds = DB::select("SELECT diet_weeks_plan.id, diet_weeks_plan.week_no,"
                        . "diet_weeks_plan.diet_plan_id,"
                        . "diet_weeks_plan.calories, diet_plans.start_date"
                        . " FROM diet_weeks_plan"
                        . " LEFT JOIN diet_plans ON diet_plans.id=diet_weeks_plan.diet_plan_id"
                        . " WHERE diet_plans.id= $saveDataPlan->id");
//        $saveDataPlan->id

        foreach ($findWeekIds as $weekId) {
            $calories = $weekId->calories;

            $divideCalories = intdiv($calories, $numberOfMeals);

            for ($i = 1; $i <= 7; $i++) {
                $saveDataToDaysPlan = new DietDays();
                $saveDataToDaysPlan->day_no = $i;
                $saveDataToDaysPlan->diet_weeks_plan_id = $weekId->id;
//                $dateToSaveStart = $saveDataPlan['start_date'];
                $dateToSave = $date->modify('+1 day');

                $saveDataToDaysPlan->date = $dateToSave;
                $saveDataToDaysPlan->save();
                //TODO !!!!!!!!!!!! BIND PARAMETERS !!!! 

                if ($numberOfMeals == 1) {
                    $query = $this->makeBreakfastMeal($divideCalories, $numberOfMeals, $dateToSave);
                } elseif ($numberOfMeals == 2) {


                    $queryBreakfast = $this->makeBreakfastMeal($divideCalories, $numberOfMeals);


                    $queryLunch = $this->makeLunch($divideCalories, $numberOfMeals);

                    $query = array_merge($queryBreakfast, $queryLunch);
                } elseif ($numberOfMeals == 3) {

                    $queryBreakfast = $this->makeBreakfastMeal($divideCalories, $numberOfMeals);

                    $queryLunch = $this->makeLunch($divideCalories, $numberOfMeals);
                    $queryDinner = $this->makeDinner($divideCalories, $numberOfMeals);
                    $query = array_merge($queryBreakfast, $queryLunch, $queryDinner);
                } elseif ($numberOfMeals == 4) {
                    $queryBreakfast = $this->makeBreakfastMeal($divideCalories, $numberOfMeals);

                    $queryLunch = $this->makeLunch($divideCalories, $numberOfMeals);
                    $queryDinner = $this->makeDinner($divideCalories, $numberOfMeals);
                    $querySnack1 = $this->makeSnack($divideCalories, $numberOfMeals);

                    $query = array_merge($queryBreakfast, $queryLunch, $queryDinner, $querySnack1);
                } elseif ($numberOfMeals == 5) {
                    $queryBreakfast = $this->makeBreakfastMeal($divideCalories, $numberOfMeals);

                    $queryLunch = $this->makeLunch($divideCalories, $numberOfMeals);
                    $queryDinner = $this->makeDinner($divideCalories, $numberOfMeals);
                    $querySnack1 = $this->makeSnack($divideCalories, $numberOfMeals);
                    $querySnack2 = $this->makeSnack2($divideCalories, $numberOfMeals);


                    $query = array_merge($queryBreakfast, $queryLunch, $queryDinner, $querySnack1, $querySnack2);
                }

                foreach ($query as $q) {

                    $dietMeal = new DietMeal();
                    $dietMeal->NDB_No_id = $q->NDB_No;
                    $dietMeal->meal_time_id = $q->meal_time_id;

                    $dietMeal->dietDay()->associate($saveDataToDaysPlan->id)->save();
                }
            }
        }


        return $saveDataPlan;
    }

//    public function userAllergies(){
//        $userAllergies[]= new UserAllergies();
//        return $userAllergies[];
//        $query = DB::select("SELECT allergies_id"
//                        . " FROM user-allergies"
//                        . " LEFT JOIN diet_plans ON diet_plans.id=user-allergies.meal_plan_id "
//                        . " LEFT JOIN  FD_GROUP ON FD_GROUP.FdGrp_CD=FOOD_DES.FdGrp_Cd"
//                        . " JOIN (select @cumSum := 0.0) B "
//                        . " WHERE @cumSum < $divideCalories "
//                        . " AND FD_GROUP.FdGrp_CD=0100"
//                        . " AND ABBREV.NDB_No >= ROUND(RAND()*(SELECT MAX(NDB_No) FROM ABBREV ))");
//    }

    /**
     * Make breakfast meal. The meals are selected from the food group 0100 .
     * @param  int  $divideCalories, $numberOfMeals
     * @return $query
     */
    public function makeBreakfastMeal($divideCalories, $numberOfMeals, $dateToSave) {
        $list = [];
        $name = "breakfast";
        $makeBreakfast = new FoodQueriesRepositories($list);
        dump($makeBreakfast);
        $setNameMeal = $makeBreakfast->setName($name);
        $getNameMeal = $makeBreakfast->getName($setNameMeal);
        dump($getNameMeal);

        $listForBreakfast = $makeBreakfast->getList($getNameMeal);
        echo 'getlist';
        dump($listForBreakfast);
        die();
        //        $list = [['1', '3', '5', '10'],[3,4]];
//        echo 'ss';
//        dump($list[0]);
//        die();
//        $calories = 0;
//        dump($dateToSave);
//        $dateArray = date_parse_from_format('Y-m-d', $dateToSave->date);
//        dump($dateArray);
//        $dateObject= (object) $dateArray;
//        dump($dateObject->day);
//        
//
//        die();
        //random values from the list
        $shuffleList = $makeBreakfast->shuffle_assoc($list);
        dump($shuffleList);
        $j = 0;
        $result = [];
        for ($i = 0; $i < count($shuffleList); $i++) {
            if ($j <= $i && $calories < 500) {

                $limit = $makeBreakfast->searchLimit($shuffleList[$i]);
                $meal = $makeBreakfast->generalFoodQuery($limit, $shuffleList[$i], $calories, $divideCalories);
                dump($shuffleList[$i]);
                $lastFoodFromArray = end($meal);
                $result = array_merge($result, $meal);

                $calories = $lastFoodFromArray->CumSum;

                $j++;
            } else {
                $result;
            }
        }
        dump($calories);
        echo 'result';
        dump($result);

        if ($calories > 500) {
            foreach ($result as $resultKey => $resultValue) {

                $values = $resultValue->CumSum;
                dump($resultKey);
                dump($values);
                if ($values > 500) {
                    unset($result[$resultKey]);
                }
            }
//            array_pop($result);
        } else {
            $result;
        }
        echo "res";
        dump($result);
        die();


        $lastFoodFromArray = end($meal);


        $nextValueList = next($shuffleList);


        $limit = $makeBreakfast->searchLimit($firstValueList);
        $meal = $makeBreakfast->generalFoodQuery($limit, $firstValueList, $calories, $divideCalories);
        dump($meal);

        $calories = $makeBreakfast->getTheLastFood($meal)->CumSum;


        dump($calories);
        if ($calories < $divideCalories) {
            if ($makeBreakfast->has_next($list)) {
                $limit = $makeBreakfast->searchLimit($nextValueList);
                echo "second list";
                dump($limit);

                $nextMeal = $makeBreakfast->generalFoodQuery($limit, $nextValueList, $calories, $divideCalories);
                $resultMeal = array_merge($meal, $nextMeal);
                dump($resultMeal);
                $lastFoodFromArray = end($resultMeal);
                $calories = $lastFoodFromArray->CumSum;
            } else {
                $resultMeal = $meal;
            }
        }
        echo 'calories';
        dump($calories);
        if ($calories < 2000) {
            $makeBreakfast->has_next($list);
            $nextValueList = next($shuffleList);

            $limit = $makeBreakfast->searchLimit($nextValueList);
            dump($nextValueList);
        }


        die();
        foreach ($meal as $m) {
            dump($m->CumSum);

            if ($m->CumSum < 500) {
                $makeBreakfast->has_next($list);
                $meal2 = $makeBreakfast->generalFoodQuery($limit, 2, $calories, $divideCalories);
            }
        }


        die();
        $x = DB::table('FD_SUBGROUP')->select('limit')->where('id', 1)->first();
        $y = $x->limit;
        dump($y);
        die();

        $queryEggs = DB::select("SELECT food.NDB_No, ABBREV.Energ_Kcal, food.FdSubgrp_id,food.Shrt_Desc
        FROM food
        LEFT JOIN ABBREV ON ABBREV.NDB_No = food.NDB_No
        LEFT JOIN FD_GROUP ON FD_GROUP.FdGrp_CD = food.FdGrp_Cd
        LEFT JOIN FD_SUBGROUP ON FD_GROUP.FdGrp_CD = FD_SUBGROUP.FdGrp_Cd
        WHERE
        (food.FdSubgrp_id = 1)

        AND ABBREV.NDB_No >= ROUND(RAND()*(SELECT MAX(NDB_No) FROM ABBREV))
        LIMIT 3");


        $runningSum = 0;
        foreach ($queryEggs as $q) {
            $q->meal_time_id = 1;
            $runningSum += $q->Energ_Kcal;
            $total = $runningSum;
        }

        if ($total < $divideCalories) {
            $query2Cheese = DB::select("SELECT food.NDB_No, ABBREV.Energ_Kcal, food.FdSubgrp_id,food.Shrt_Desc,( @cumSum:= @cumSum + ABBREV.Energ_Kcal)  AS CumSum
        FROM food
        LEFT JOIN ABBREV ON ABBREV.NDB_No = food.NDB_No
        LEFT JOIN FD_GROUP ON FD_GROUP.FdGrp_CD = food.FdGrp_Cd
        LEFT JOIN FD_SUBGROUP ON FD_GROUP.FdGrp_CD = FD_SUBGROUP.FdGrp_Cd
        JOIN (select @cumSum := $total) B
        WHERE @cumSum <  $divideCalories
        AND
        (food.FdSubgrp_id = 3)

        AND ABBREV.NDB_No >= ROUND(RAND()*(SELECT MAX(NDB_No) FROM ABBREV))
        LIMIT 1");

            foreach ($query2Cheese as $q) {
                $q->meal_time_id = 1;
            }

            $endCumSumCheese = $endCumSum->CumSum;
            dump($endCumSumCheese);
        }
        if ($endCumSumCheese < $divideCalories) {
            $query3Ham = DB::select("SELECT food.NDB_No, ABBREV.Energ_Kcal, food.FdSubgrp_id,food.Shrt_Desc,( @cumSum:= @cumSum + ABBREV.Energ_Kcal)  AS CumSum
        FROM food
        LEFT JOIN ABBREV ON ABBREV.NDB_No = food.NDB_No
        LEFT JOIN FD_GROUP ON FD_GROUP.FdGrp_CD = food.FdGrp_Cd
        LEFT JOIN FD_SUBGROUP ON FD_GROUP.FdGrp_CD = FD_SUBGROUP.FdGrp_Cd
        JOIN (select @cumSum := $endCumSumCheese) B
        WHERE @cumSum <  $divideCalories
        AND
        (food.FdSubgrp_id = 10)

        AND ABBREV.NDB_No >= ROUND(RAND()*(SELECT MAX(NDB_No) FROM ABBREV))
        LIMIT 3");
            foreach ($query2Cheese as $q) {
                $q->meal_time_id = 1;
            }
            dump($query3Ham);
        }





        die();
        return $query;
    }

    /**
     * Make lunch meal. The meals are selected from the food group 2200 .
     * @param  int  $divideCalories, $numberOfMeals
     * @return $query
     */
    public function makeLunch($divideCalories, $numberOfMeals) {


        $query = DB::select("SELECT ABBREV.NDB_No,FD_GROUP.FdGrp_CD"
                        . " ,( @cumSum:= @cumSum + ABBREV.Energ_Kcal)"
                        . " AS cumSum"
                        . " FROM ABBREV"
                        . " LEFT JOIN FOOD_DES ON FOOD_DES.NDB_No=ABBREV.NDB_No "
                        . " LEFT JOIN  FD_GROUP ON FD_GROUP.FdGrp_CD=FOOD_DES.FdGrp_Cd"
                        . " JOIN (select @cumSum := 0.0) B "
                        . " WHERE @cumSum < " . $divideCalories
                        . " AND FD_GROUP.FdGrp_CD=2200"
                        . " AND ABBREV.NDB_No >= ROUND(RAND()*(SELECT MAX(NDB_No) FROM ABBREV ))");


        foreach ($query as $q) {
            $q->meal_time_id = 2;
        }

        return $query;
    }

    /**
     * Make dinner meal. The meals are selected from the food group 1600 .
     * @param  int  $divideCalories, $numberOfMeals
     * @return $query
     */
    public function makeDinner($divideCalories, $numberOfMeals) {


        $query = DB::select("SELECT ABBREV.NDB_No,FD_GROUP.FdGrp_CD"
                        . " ,( @cumSum:= @cumSum + ABBREV.Energ_Kcal)"
                        . " AS cumSum"
                        . " FROM ABBREV"
                        . " LEFT JOIN FOOD_DES ON FOOD_DES.NDB_No=ABBREV.NDB_No "
                        . " LEFT JOIN  FD_GROUP ON FD_GROUP.FdGrp_CD=FOOD_DES.FdGrp_Cd"
                        . " JOIN (select @cumSum := 0.0) B "
                        . " WHERE @cumSum < " . $divideCalories
                        . " AND FD_GROUP.FdGrp_CD=1600"
                        . " AND ABBREV.NDB_No >= ROUND(RAND()*(SELECT MAX(NDB_No) FROM ABBREV ))");


        foreach ($query as $q) {
            $q->meal_time_id = 3;
        }
        return $query;
    }

    /**
     * Make first snack meal (fruits and vegetables). The meals are selected from the food group 0900 .
     * @param  int  $divideCalories, $numberOfMeals
     * @return $query
     */
    public function makeSnack($divideCalories, $numberOfMeals) {


        $query = DB::select("SELECT ABBREV.NDB_No,FD_GROUP.FdGrp_CD"
                        . " ,( @cumSum:= @cumSum + ABBREV.Energ_Kcal)"
                        . " AS cumSum"
                        . " FROM ABBREV"
                        . " LEFT JOIN FOOD_DES ON FOOD_DES.NDB_No=ABBREV.NDB_No "
                        . " LEFT JOIN  FD_GROUP ON FD_GROUP.FdGrp_CD=FOOD_DES.FdGrp_Cd"
                        . " JOIN (select @cumSum := 0.0) B "
                        . " WHERE @cumSum < " . $divideCalories
                        . " AND FD_GROUP.FdGrp_CD=0900"
                        . " AND ABBREV.NDB_No >= ROUND(RAND()*(SELECT MAX(NDB_No) FROM ABBREV ))");


        foreach ($query as $q) {
            $q->meal_time_id = 4;
        }
        return $query;
    }

    /**
     * Make second snack meal (fruits and vegetables). The meals are selected from the food group 0900 .
     * @param  int  $divideCalories, $numberOfMeals
     * @return $query
     */
    public function makeSnack2($divideCalories, $numberOfMeals) {


        $query = DB::select("SELECT ABBREV.NDB_No,FD_GROUP.FdGrp_CD"
                        . " ,( @cumSum:= @cumSum + ABBREV.Energ_Kcal)"
                        . " AS cumSum"
                        . " FROM ABBREV"
                        . " LEFT JOIN FOOD_DES ON FOOD_DES.NDB_No=ABBREV.NDB_No "
                        . " LEFT JOIN  FD_GROUP ON FD_GROUP.FdGrp_CD=FOOD_DES.FdGrp_Cd"
                        . " JOIN (select @cumSum := 0.0) B "
                        . " WHERE @cumSum < " . $divideCalories
                        . " AND FD_GROUP.FdGrp_CD=0900"
                        . " AND ABBREV.NDB_No >= ROUND(RAND()*(SELECT MAX(NDB_No) FROM ABBREV ))");


        foreach ($query as $q) {
            $q->meal_time_id = 5;
        }
        return $query;
    }

    /**
     * Get the meals for the plan .
     * @param  int  $saveDataPlan
     * @return $object
     */
    public function getDatesForPlan($saveDataPlan) {
        $userId = Auth::user()->id;
        $selectWeeks = \DB::table('diet_plans')
                        ->select("users.id as user_id", "diet_plans.id as diet_plan_id", "diet_plans.weeks", "diet_plans.diet_plan_type_id")
                        ->leftJoin('users', 'users.id', '=', 'diet_plans.user_id')
                        ->leftJoin('diet_plan_type', 'diet_plan_type.id', '=', 'diet_plans.diet_plan_type_id')
                        ->where('user_id', $userId)
                        ->where('diet_plans.id', $saveDataPlan->id)
//                $saveDataPlan->id
                        ->whereIn('diet_plans.diet_plan_type_id', [1, 2])
                        ->get()->toArray();

        $output = [];
        $outputDays = [];
        foreach ($selectWeeks as $week) {
            for ($i = 1; $i <= $week->weeks; $i++) {
                for ($j = 1; $j <= 7; $j++) {

                    $food["week_no_$i"]["day_$j"] = \DB::table('diet_days')
                                    ->select("diet_meals.NDB_No_id", "ABBREV.Shrt_Desc", "ABBREV.Energ_Kcal", "diet_meals.meal_time_id", "diet_days.date")
                                    ->leftJoin('diet_weeks_plan', 'diet_days.diet_weeks_plan_id', '=', 'diet_weeks_plan.id')
                                    ->where('diet_weeks_plan.diet_plan_id', '=', $week->diet_plan_id)
                                    ->where('diet_weeks_plan.week_no', '=', $i)
                                    ->where('diet_days.day_no', '=', $j)
                                    ->leftJoin(DB::raw("(SELECT diet_meals.NDB_No_id, diet_meals.diet_day_id, diet_meals.meal_time_id  FROM diet_meals) as diet_meals"), function($join) {
                                        $join->on("diet_meals.diet_day_id", "=", "diet_days.id");
                                    })
                                    ->leftJoin(DB::raw("(SELECT ABBREV.Shrt_Desc,ABBREV.Energ_Kcal,ABBREV.NDB_No  FROM ABBREV) as ABBREV"), function($join) {
                                        $join->on("diet_meals.NDB_No_id", "=", "ABBREV.NDB_No");
                                    })
                                    ->get()->toArray();
                    $output = $food;
                }
            }
        }




        $weeks = [];
        $breakFast = [];
        $lunchDay1 = [];
        foreach ($output as $weekNo => $daysArray) {
            foreach ($daysArray as $dayNo => $foodArray) {

                foreach ($foodArray as $foods) {
                    if ($foods->meal_time_id == 1) {


                        $weeks[$foods->date]["breakfast"][$foods->Shrt_Desc] = $foods->Energ_Kcal;
                    } elseif ($foods->meal_time_id == 2) {
                        $weeks[$foods->date]["lunch"][$foods->Shrt_Desc] = $foods->Energ_Kcal;
//                        $weeks[$foods->date]["lunch"][] = $foods->Shrt_Desc . " calories " . $foods->Energ_Kcal;
                    } elseif ($foods->meal_time_id == 3) {
                        $weeks[$foods->date]["dinner"][$foods->Shrt_Desc] = $foods->Energ_Kcal;

//                        $weeks[$foods->date]["dinner"][] = $foods->Shrt_Desc . " calories " . $foods->Energ_Kcal;
                    } elseif ($foods->meal_time_id == 4) {
                        $weeks[$foods->date]["firstSnack"][$foods->Shrt_Desc] = $foods->Energ_Kcal;

//                        $weeks[$foods->date]["firstSnack"][] = $foods->Shrt_Desc . " calories " . $foods->Energ_Kcal;
                    } elseif ($foods->meal_time_id == 5) {
                        $weeks[$foods->date]["secondSnack"][$foods->Shrt_Desc] = $foods->Energ_Kcal;

//                        $weeks[$foods->date]["secondSnack"][] = $foods->Shrt_Desc . " calories " . $foods->Energ_Kcal;
                    } else {
                        die('feature');
                    }
                }
            }
        }
        $object = json_encode($weeks);

        return $object;
    }

}
