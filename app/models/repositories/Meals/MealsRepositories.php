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
use Illuminate\Support\Facades\Auth;

class MealsRepositories {

    public function getBreakfast($dietPlanType, $numberOfMeals) {
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
        foreach ($sessionCaloriesPerWeek as $key => $value) {
            $saveDataWeeksPlan = new DietWeeksPlan();

            $saveDataWeeksPlan->week_no = $key;

            $saveDataWeeksPlan->calories = $value;
            $saveDataWeeksPlan->dietPlan()->associate($saveDataPlan->id)->save();
        }

        echo '<pre>';
        $findWeekIds = DB::select("SELECT diet_weeks_plan.id, diet_weeks_plan.week_no,diet_weeks_plan.diet_plan_id,diet_weeks_plan.calories"
                        . " FROM diet_weeks_plan"
                        . " LEFT JOIN diet_plans ON diet_plans.id=diet_weeks_plan.diet_plan_id");
        foreach ($findWeekIds as $weekId) {
            for ($i = 1; $i <= 7; $i++) {
                $saveDataToDaysPlan = new DietDays();
                $saveDataToDaysPlan->day_no = $i;
                $saveDataToDaysPlan->diet_weeks_plan_id = $weekId->id;
                $saveDataToDaysPlan->diet_plan_id = $weekId->diet_plan_id;
                $saveDataToDaysPlan->save();
                $query = DB::select("SELECT ABBREV.NDB_No"
                                . " ,( @cumSum:= @cumSum + ABBREV.Energ_Kcal)"
                                . " AS cumSum"
                                . " FROM ABBREV"
                                . " JOIN (select @cumSum := 0.0) B "
                                . "WHERE @cumSum < $weekId->calories"
                                . " AND ABBREV.NDB_No >= ROUND(RAND()*(SELECT MAX(NDB_No) FROM ABBREV ))");
                foreach ($query as $q) {
                    var_dump($query);
                    $dietMeal = new DietMeal();
                    $dietMeal->NDB_No_id = $q->NDB_No;
                    $dietMeal->meal_time_id = 1;

                    $dietMeal->dietDay()->associate($saveDataToDaysPlan->id)->save();
                }


//                var_dump($dietMeal);
            }
        }

        die();

        $query = [];
        $day = [];
        foreach ($sessionCaloriesPerWeek as $key => $valueSessionCaloriesPerWeek) {
            $j = 0;
            while ($j < 8) {

                $query["week_$key"] = DB::select("SELECT ABBREV.NDB_No,ABBREV.Shrt_Desc,ABBREV.Energ_Kcal,"
                                . " ( @cumSum:= @cumSum + ABBREV.Energ_Kcal)"
                                . " AS cumSum"
                                . " FROM ABBREV"
                                . " LEFT JOIN FOOD_DES ON FOOD_DES.NDB_No=ABBREV.NDB_No "
                                . "LEFT JOIN  FD_GROUP ON FD_GROUP.FdGrp_CD=FOOD_DES.FdGrp_Cd"
                                . " JOIN (select @cumSum := 0.0) B "
                                . "WHERE @cumSum < $valueSessionCaloriesPerWeek"
                                . " AND FD_GROUP.FdGrp_CD=0100"
                                . " AND ABBREV.NDB_No >= ROUND(RAND()*(SELECT MAX(NDB_No) FROM ABBREV ))");



//                               $saveData = new DietMeal($query);


                echo '<pre>';



                $j++;
                var_dump($query);

//                DB::table('diet_meals')->insert($query); // Query Builder
//                $saveData = new DietMeal($query);
////                $saveData['diet_plan_type_id']=1;
////                $saveData['user_id']=$userId;
////
//                $saveData->save();
            }
        }

        return $output;
    }

}
