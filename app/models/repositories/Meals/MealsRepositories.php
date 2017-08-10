<?php

namespace Repositories\Meals;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Braunson\FatSecret\FatSecret;
use App\models\entities\DietPlan;
use App\models\entities\AbbrevFood;
use App\models\entities\DietMeal;
use App\Models\Entities\DietWeeksPlan;
use App\Models\Entities\DietDays;
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
        $w = DietWeeksPlan::where('diet_plan_id', '=', $saveDataPlan->id)
                        ->select('calories', 'week_no', 'id')
                        ->get()->toArray();
        echo '<pre>';
        var_dump($w);
            for ($i = 1; $i <= 7; $i++) {
                $find = new DietDays();
                $find->day_no = $i;
            }
//                    $find->day_no=1;
        die();
        $find = new DietDays();
        $find->dietWeeksPlan()->attach($saveDataWeeksPlan);
//            $find->day_no=1;
//            $find->dietWeeksPlan()->associate($saveDataWeeksPlan->id)->save(); 
//            die();
//        var_dump($dietPlanType);
//        var_dump($numberOfMeals);
//
//        die();
//        



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
