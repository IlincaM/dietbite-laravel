<?php

namespace Repositories\Meals;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Braunson\FatSecret\FatSecret;

class MealsRepositories {

    public function getBreakfast() {

////Signature Base String
////<HTTP Method>&<Request URL>&<Normalized Parameters>
//$base = rawurlencode("GET")."&";
//$base .= "http%3A%2F%2Fplatform.fatsecret.com%2Frest%2Fserver.api&";
//
////sort params by abc....necessary to build a correct unique signature
//$params = "method=foods.search&";
//$params .= "oauth_consumer_key=efc8dbd1b2454035aa2d9977976eeaa2&"; // ur consumer key
//$params .= "oauth_nonce=123&";
//$params .= "oauth_signature_method=HMAC-SHA1&";
//$params .= "oauth_timestamp=".time()."&";
//$params .= "oauth_version=1.0&";
//$params .= "search_expression=apple";
//$params2 = rawurlencode($params);
//$base .= $params2;
//
////encrypt it!
//$sig= base64_encode(hash_hmac('sha1', $base, "9c858934cc664d7399c166b108f552ed&", true)); // replace xxx with Consumer Secret
//
//
////now get the search results and write them down
//$url = "http://platform.fatsecret.com/rest/server.api?".$params."&oauth_signature=".rawurlencode($sig);
//
//$food_feed = file_get_contents($url);
//echo $food_feed;
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

             $query = DB::select("SELECT abbrev.NDB_No,abbrev.Shrt_Desc,abbrev.Energ_Kcal,"
                            . " ( @cumSum:= @cumSum + abbrev.Energ_Kcal)"
                            . " AS cumSum"
                            . " FROM abbrev"
                            . " LEFT JOIN food_des ON food_des.NDB_No=abbrev.NDB_No "
                            . "LEFT JOIN  fd_group ON fd_group.FdGrp_CD=food_des.FdGrp_Cd"
                            . " JOIN (select @cumSum := 0.0) B "
                            . "WHERE @cumSum < 2000" 
                            . " AND fd_group.FdGrp_CD=0100"
                            . " AND abbrev.NDB_No >= ROUND(RAND()*(SELECT MAX(NDB_No) FROM abbrev ))");
            
          
       
        
        
        echo '<pre>';
        var_dump($query);
        $getBreakfast = "test";
        return $getBreakfast;
    }

}
