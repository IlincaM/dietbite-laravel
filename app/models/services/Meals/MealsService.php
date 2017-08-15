<?php

namespace Services\MealsService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Repositories\Meals\MealsRepositories;

/**
 * Creates the dialy meal
 * @param  \Illuminate\Http\Request  $request
 * @param   Repositories\Meals\MealsRepositories  $mealsRepo
 * @author ilinca
 */
class MealsService {

    public function makeBreakfast(Request $request, MealsRepositories $mealsRepo) {
        $numberOfMeals = $request->nummeals;
        $dietPlanType = $request->planType;

     
        $makeBreakfast = $mealsRepo->getBreakfast($dietPlanType,$numberOfMeals);

        return $makeBreakfast;
    }

}
