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

class MealsRepositories {

    public function makePlan($dietPlanType, $numberOfMeals) {
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
        $saveDataPlan->save();

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
                        . " LEFT JOIN diet_plans ON diet_plans.id=diet_weeks_plan.diet_plan_id");
        foreach ($findWeekIds as $weekId) {

            for ($i = 1; $i <= 7; $i++) {
                $saveDataToDaysPlan = new DietDays();
                $saveDataToDaysPlan->day_no = $i;
                $saveDataToDaysPlan->diet_weeks_plan_id = $weekId->id;
                $saveDataToDaysPlan->save();
                //TODO !!!!!!!!!!!! BIND PARAMETERS !!!! 
                $query = DB::select("SELECT ABBREV.NDB_No"
                                . " ,( @cumSum:= @cumSum + ABBREV.Energ_Kcal)"
                                . " AS cumSum"
                                . " FROM ABBREV"
                                . " LEFT JOIN FOOD_DES ON FOOD_DES.NDB_No=ABBREV.NDB_No "
                                . " LEFT JOIN  FD_GROUP ON FD_GROUP.FdGrp_CD=FOOD_DES.FdGrp_Cd"
                                . " JOIN (select @cumSum := 0.0) B "
                                . " WHERE @cumSum < $weekId->calories"
                                . " AND FD_GROUP.FdGrp_CD=0100"
                                . " AND ABBREV.NDB_No >= ROUND(RAND()*(SELECT MAX(NDB_No) FROM ABBREV ))");
                foreach ($query as $q) {
                    $dietMeal = new DietMeal();
                    $dietMeal->NDB_No_id = $q->NDB_No;
                    $dietMeal->meal_time_id = 1;

                    $dietMeal->dietDay()->associate($saveDataToDaysPlan->id)->save();
                }
            }
        }

        $selectWeeks = \DB::table('diet_plans')
                        ->select("users.id as user_id", "diet_plans.id as diet_plan_id", "diet_plans.weeks", "diet_plans.diet_plan_type_id")
                        ->leftJoin('users', 'users.id', '=', 'diet_plans.user_id')
                        ->leftJoin('diet_plan_type', 'diet_plan_type.id', '=', 'diet_plans.diet_plan_type_id')
                        ->where('user_id', $userId)
                        ->whereIn('diet_plans.diet_plan_type_id', [1, 2])
                        ->get()->toArray();
        $output = [];
        $outputDays = [];
        foreach ($selectWeeks as $week) {
            for ($i = 1; $i <= $week->weeks; $i++) {
               for($j=1;$j<=7;$j++) {

                    $food["week_no_$i"]["day_$j"] = \DB::table('diet_days')
                                    ->select("diet_meals.NDB_No_id","ABBREV.Shrt_Desc","ABBREV.Energ_Kcal")
                                    ->leftJoin('diet_weeks_plan', 'diet_days.diet_weeks_plan_id', '=', 'diet_weeks_plan.id')
                                    ->where('diet_weeks_plan.diet_plan_id', '=', $week->diet_plan_id)
                                    ->where('diet_weeks_plan.week_no', '=', $i)
                                    ->where('diet_days.day_no', '=', $j)
                                    ->leftJoin(DB::raw("(SELECT diet_meals.NDB_No_id, diet_meals.diet_day_id  FROM diet_meals) as diet_meals"), function($join) {
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
     
        return $output;
    }

}
