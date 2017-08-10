<?php

namespace Repositories\Meals;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Braunson\FatSecret\FatSecret;
use App\models\entities\DietPlan;
use App\models\entities\AbbrevFood;
use App\models\entities\DietMeal;
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

//        var_dump($dietPlanType);
//        var_dump($numberOfMeals);
//
//        die();
//        



        $query = [];
        $day = [];
        foreach ($sessionCaloriesPerWeek as $key => $valueSessionCaloriesPerWeek) {
            $j = 0;
            while ($j < 7) {

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
                               $saveData = new DietMeal($query);
              

                               echo '<pre>';
                              $x=  $query["week_$key"] ;
                              var_dump($x);
                var_dump($query);


                $j++;




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
