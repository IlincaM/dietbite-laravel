<?php

namespace Repositories\Meals;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Braunson\FatSecret\FatSecret;

class MealsRepositories {

    public function test() {

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
        $food = DB::table('ABBREV')->where('NDB_No', '28231')->first();
        $sessionCaloriesPerWeek = Session::get('result');
        $x = DB::table('ABBREV')
                ->join('food_des', 'ABBREV.NDB_No', '=', 'food_des.NDB_No')
                ->join('fd_group', 'food_des.FdGrp_Cd', '=', 'fd_group.FdGrp_Cd')
                ->where('fd_group.FdGrp_Cd', '0100')
                ->inRandomOrder()
                ->take(2)
                ->get();
        echo '<pre>';
        var_dump($x);
        return $sessionCaloriesPerWeek;
    }

}
