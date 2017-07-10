<?php

namespace Services\MealsService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Repositories\Meals\MealsRepositories;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MealsService
 *
 * @author ilinca
 */
class MealsService {

    public function makeBreakfast(Request $request, MealsRepositories $mealsRepo) {
        $numberOfMeals = $request->nummeals;

        $makeBreakfast =$mealsRepo->getBreakfast();
        echo '<pre>';
        return $makeBreakfast;
    }

}
