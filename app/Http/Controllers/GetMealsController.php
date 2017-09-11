<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Services\Charts\ChartsService;
use Repositories\Bmr\BmrResultRepository;
use Services\User\UserService;
use ConsoleTVs\Charts\Facades\Charts;
use Repositories\Meals\MealsRepositories;
use Services\MealsService\MealsService;
use Services\Bmr\BmrService;
class GetMealsController extends Controller
{
        public function store(Request $request, ChartsService $chartService, BmrResultRepository $bmrRepo, UserService $user, MealsService $mealsService, MealsRepositories $mealsRepo) {
        $lava = new ChartsService();
        $lava = $chartService->makeBarChart($request, $bmrRepo, $user);
        $makeMeals = $mealsService->makeMealsTable($request, $mealsRepo);
        return view('layouts.getMeals', ['makeMeals' => $makeMeals]);
    }
    
    public function listData() {

        return response()->json();
    }
}
