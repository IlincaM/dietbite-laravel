<?php

namespace Repositories\Meals;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class MealsRepositories {
    
    public function test(){
        $food = DB::table('ABBREV')->where('NDB_No', '28231')->first();
$sessionCaloriesPerWeek= Session::get('result');
return $sessionCaloriesPerWeek;
    }
}
