<?php

namespace Repositories\Bmr;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\StoreBmrResult;
use Entities\BmrResult;
use stdClass;
use Illuminate\Http\Request;

/**
 * Description of BmrResultRepository
 * Bmr repository, containing 
 * commonly used queries
 * @author ilinca
 */
class BmrResultRepository implements BmrInterface {
        
    public function getDataFormBmr() {
        return [
            'bmr_activity' => BmrActivity::all(),
            'bmr_exercise' => BmrExercise::all(),
        ];
    }

    public function storeBmrResult($data) {
        $dataArray = (array) $data;
        $dataResut = new BmrResult($dataArray);
        $dataResut->save();
        return $dataResut;
    }

}
