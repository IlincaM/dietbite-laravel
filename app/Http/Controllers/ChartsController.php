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

class ChartsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function showChart(Request $request, ChartsService $chartService, BmrResultRepository $bmrRepo, UserService $user, MealsService $mealsService, MealsRepositories $mealsRepo) {
        $lava = new ChartsService();
        $lava = $chartService->makeBarChart($request, $bmrRepo, $user);

//        return view('layouts.index', ['data' => $data->getDataFormBmr(), 'makeMeals' => $makeMeals]);

        return view('layouts.getChart', ['lava' => $lava]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
