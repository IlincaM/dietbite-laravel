<?php

namespace Services\Charts;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Repositories\Bmr\BmrResultRepository;
use Services\User\UserService;
use Illuminate\Support\Facades\Auth;

class ChartsService {

    public function makeChart(Request $request,BmrResultRepository $bmrResultRepo, UserService $user) {
            $id = Auth::user()->id;
        echo '<pre>';
        
 $data = $user->getUserById($id);
 
 foreach ($data as $dataForChart){
     $dataForChart;

 }
 var_dump($dataForChart["weight"]);die();
        $bmrResult = $request->cal_input;
        $bmrResult = $request->cal_input;
        $goalWeight = $request->hidden_goal_weight;
        $const4 = 4;
        $const9 = 9;
        $x = 1.98;
        $y = 1.1;
        $calc1 = $x * $goalWeight;
        $calc2 = $y * $goalWeight;
        $protein = $calc1 * $const4;
        $fat = $calc2 * $const9;
        $cal = $bmrResult - $protein - $fat;

        $lava = new Lavacharts;
        $reasons = $lava->DataTable();
        $reasons->addStringColumn('Reasons')
                ->addNumberColumn('Percent')
                ->addRow(['Protein', $protein])
                ->addRow(['Fat', $fat])
                ->addRow(['Carbs', $cal]);
        $pieChart = $lava->PieChart('Calories', $reasons, [
            'title' => 'Percent calories from your TDEE result: ' . $bmrResult,
            'is3D' => true,
            'slices' => [
                    ['offset' => 0.01]
            ],
            'legend' => [
                'position' => 'labeled'
            ]
        ]);
        return $lava;
    }



}
