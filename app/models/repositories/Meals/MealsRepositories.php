<?php

namespace Repositories\Meals;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Braunson\FatSecret\FatSecret;

class MealsRepositories {

    public function getBreakfast() {

        $sessionCaloriesPerWeek = Session::get('result');
        $subquery = DB::raw("(select @cumSum := 0.0)B");

//            $getBreakfast = DB::table('ABBREV')
//                    ->select(DB::raw('ABBREV.NDB_No,ABBREV.Shrt_Desc,ABBREV.Energ_Kcal , (@cumSum:= @cumSum + ABBREV.Energ_Kcal) as cumSum'))
//                    ->join('FOOD_DES', 'ABBREV.NDB_No', '=', 'FOOD_DES.NDB_No')
//                    ->join('FD_GROUP', 'FOOD_DES.FdGrp_Cd', '=', 'FD_GROUP.FdGrp_Cd')
//                    ->join($subquery, function ($join) {
//                        $subq = DB::raw(' (@cumSum )');
//                        $join->on($subq, '=', $subq);
//                    })
//                    ->where(DB::raw('@cumSum'), '<=', $valueSessionCaloriesPerWeek)
//                    ->get();
//for($i=0;$i< sizeof($sessionCaloriesPerWeek);$i++){
//                     $query = DB::select("SELECT ABBREV.NDB_No,ABBREV.Shrt_Desc,ABBREV.Energ_Kcal,"
//                            . " ( @cumSum:= @cumSum + ABBREV.Energ_Kcal)"
//                            . " AS cumSum"
//                            . " FROM ABBREV"
//                            . " LEFT JOIN FOOD_DES ON FOOD_DES.NDB_No=ABBREV.NDB_No "
//                            . "LEFT JOIN  FD_GROUP ON FD_GROUP.FdGrp_CD=FOOD_DES.FdGrp_Cd"
//                            . " JOIN (select @cumSum := 0.0) B "
//                            . "WHERE @cumSum < $sessionCaloriesPerWeek[$i]" 
//                            . " AND FD_GROUP.FdGrp_CD=0100"
//                            . " AND ABBREV.NDB_No >= ROUND(RAND()*(SELECT MAX(NDB_No) FROM ABBREV ))");
//    
//    
//}


        foreach ($sessionCaloriesPerWeek as $key => $valueSessionCaloriesPerWeek) {
            $query = DB::select("SELECT ABBREV.NDB_No,ABBREV.Shrt_Desc,ABBREV.Energ_Kcal,"
                            . " ( @cumSum:= @cumSum + ABBREV.Energ_Kcal)"
                            . " AS cumSum"
                            . " FROM ABBREV"
                            . " LEFT JOIN FOOD_DES ON FOOD_DES.NDB_No=ABBREV.NDB_No "
                            . "LEFT JOIN  FD_GROUP ON FD_GROUP.FdGrp_CD=FOOD_DES.FdGrp_Cd"
                            . " JOIN (select @cumSum := 0.0) B "
                            . "WHERE @cumSum < $valueSessionCaloriesPerWeek"
                            . " AND FD_GROUP.FdGrp_CD=0100"
                            . " AND ABBREV.NDB_No >= ROUND(RAND()*(SELECT MAX(NDB_No) FROM ABBREV ))");


            echo '<pre>';
            $output = json_encode(array("week-$key" => $query));
            print_r($output);


        }
                                            return $output;

    }

}
