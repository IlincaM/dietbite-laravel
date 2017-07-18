<?php

namespace Repositories\Meals;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Braunson\FatSecret\FatSecret;

class MealsRepositories {

    public function getBreakfast() {

        $sessionCaloriesPerWeek = Session::get('result');
$query= [];
$day=[];
        foreach ($sessionCaloriesPerWeek as $key => $valueSessionCaloriesPerWeek) {
            $j = 0;
            while ($j < 7) {

                $query["week-$key"] = DB::select("SELECT ABBREV.NDB_No,ABBREV.Shrt_Desc,ABBREV.Energ_Kcal,"
                                . " ( @cumSum:= @cumSum + ABBREV.Energ_Kcal)"
                                . " AS cumSum"
                                . " FROM ABBREV"
                                . " LEFT JOIN FOOD_DES ON FOOD_DES.NDB_No=ABBREV.NDB_No "
                                . "LEFT JOIN  FD_GROUP ON FD_GROUP.FdGrp_CD=FOOD_DES.FdGrp_Cd"
                                . " JOIN (select @cumSum := 0.0) B "
                                . "WHERE @cumSum < $valueSessionCaloriesPerWeek"
                                . " AND FD_GROUP.FdGrp_CD=0100"
                                . " AND ABBREV.NDB_No >= ROUND(RAND()*(SELECT MAX(NDB_No) FROM ABBREV ))");
                $j++;
                echo '<pre>';
//                $output = json_encode(array(" day-$j" => $query));
//                
//                var_dump($output);
                                                    var_dump($query);

            }

        }

        return $output;
    }

}
