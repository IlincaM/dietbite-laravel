<?php

namespace Services\Bmr;

use Entities;
use Entities\BmrActivity;
use Entities\BmrExercise;
use Entities\BmrResult;
use Illuminate\Http\Request;
use Repositories\Bmr\BmrResultRepository;
use Repositories\Bmr\BmrInterface;
use Carbon\Carbon;
use App\Http\Requests\StoreBmrResult;
use Illuminate\Support\Facades\Auth;
use Services\User\UserService;

class BmrService {

    public function getDataFormBmr() {
        $data = array(
            'bmr_activity' => BmrActivity::all(),
            'bmr_exercise' => BmrExercise::all(),
        );
        return $data;
    }

    public function getBmrData(StoreBmrResult $request) {
        $data = new BmrResultRepository();
        $data = $this->setBmrResultData($data, $request);
      

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
        if (Auth::user() == true) {
            $data->user_id = Auth::user()->id;
        } else {
            $fakeUserCreate = new UserService();
            $fakeUser = $fakeUserCreate->makeUserFake();
            Auth::login($fakeUser);
            $data->user_id = $fakeUser->id;
        }

        return $data->storeBmrResult($data);
    }

    private function setBmrResultData(BmrResultRepository $bmrResultRepo, StoreBmrResult $request) {
        $bmrResultRepo->age = $request->age;
        $bmrResultRepo->weight = $request->weight;
        $bmrResultRepo->goal_weight = $request->goal_weight;
        $bmrResultRepo->height = $request->height;
        $bmrResultRepo->gender = $request->gender;
        $bmrResultRepo->activityLevel = $request->activityLevel;
        $bmrResultRepo->exerciseLevel = $request->exerciseLevel;
        $dt = Carbon::now();
        $bmrResultRepo->created_at = $dt->toDateString();
        $bmrResultRepo->updated_at = $dt->toDateString();

        return $bmrResultRepo;
           
    }

}
