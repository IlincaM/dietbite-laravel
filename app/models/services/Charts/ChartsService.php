<?php

namespace Services\Charts;

use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Khill\Lavacharts\Lavacharts;
use Repositories\Bmr\BmrResultRepository;
use Services\User\UserService;
use Illuminate\Support\Facades\Session;
class ChartsService {

    public function makeChart(Request $request, BmrResultRepository $bmrResultRepo, UserService $user) {
        if (Auth::user()) {
            $id = Auth::user()->id;
        } else {
            $userService = new UserService();
            $fakeUser = $userService->makeUserFake();
        }

        $data = $user->getUserById($id);

        foreach ($data as $dataForChart) {
            $dataForChart;
        }
        $bmrResult = $dataForChart["bmr_result"];
        $goalWeight = $dataForChart ["goal_weight"];
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

    public function makeBarChart(Request $request, BmrResultRepository $bmrResultRepo, UserService $user) {
        if (Auth::user()) {
            $id = Auth::user()->id;
        } else {
            $userService = new UserService();
            $fakeUser = $userService->makeUserFake();
        }

        $data = $user->getUserById($id);

        foreach ($data as $dataForChart) {
            $dataForChart;
        }
        $result = []; // Empty array
        $bmrResult = $dataForChart["bmr_result"];
        $goalWeight = $dataForChart ["goal_weight"];
        $weight = $dataForChart ["weight"];
        $weeks = ($weight - $goalWeight) / 0.6;
        $labelsForChart = [];
        for ($i = 0; $i <= $weeks; $i++) {
            $bmrResult = $bmrResult * (100 - 7.5) / 100;
            $result[$i] = $bmrResult;

            $labelsForChart[$i] = $i;
        }
                       Session::put('result', $result);

        $chart = Charts::create('bar', 'highcharts')
                ->title('Calories per day')
                ->elementLabel('Calories to consume')
                ->values($result)
                ->labels($labelsForChart)
                ->dimensions(800, 500)
                ->colors(['blue'])
                ->responsive(false);

        return $chart;
    }

}
