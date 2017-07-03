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

<<<<<<< HEAD
//         var_dump($dataResut->weight);die();
=======
>>>>>>> bb448ead086f014314a86400a11c23a97056b3cb
        return $dataResut;
    }

}
