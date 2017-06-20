<?php

namespace Services\Bmr;

use Entities;
use Entities\BmrActivity;
use Entities\BmrExercise;
use Entities\BmrResult;
use Illuminate\Http\Request;
use Repositories\Bmr\BmrResultRepository;
use Repositories\Bmr\bmrInterface;
use Carbon\Carbon;
use App\Http\Requests\StoreBmrResult;

class BmrService {


    public function getDataFormBmr() {
        $data = array(
            'bmr_activity' => BmrActivity::all(),
            'bmr_exercise' => BmrExercise::all(),
        );
        return $data;
    }

    public function getBmrData(Request $request) {
        $data = new BmrResultRepository();
        $data->age = $request->age;
        $data->weight = $request->weight;
        $data->goal_weight = $request->goal_weight;
        $data->height = $request->height;
        $data->gender = $request->gender;
        $data->activityLevel = $request->activityLevel;
        $data->exerciseLevel = $request->exerciseLevel;
        $dt = Carbon::now();
        $data->created_at = $dt->toDateString();
        $data->updated_at = $dt->toDateString();

        if ($data->gender == "male") {
            (float) $activityAndExercise = $data->activityLevel + $data->exerciseLevel;
            (float) $calculate = 9.99 * $data->weight + 6.25 * $data->height - 4.92 * $data->age + 5;
            (float) $result = $calculate * $activityAndExercise;
        } else {
            (float) $activityAndExercise = $data->activityLevel + $data->exerciseLevel;
            (float) $calculat = 9.99 * $data->weight + 6.25 * $data->height - 4.92 * $data->age - 161;
            (float) $result = $calculat * $activityAndExercise;
        }
        $data->bmr_result = $result;
        

        return  $data->storeBmrResult($data);
    }

}
