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
class BmrResultRepository implements bmrInterface {

    public function getDataFormBmr() {
        $data = array(
            'bmr_activity' => BmrActivity::all(),
            'bmr_exercise' => BmrExercise::all(),
        );
        return $data;
    }

    public function storeBmrResult($data) {
        $dataArray = (array) $data;
        $dataResut = new BmrResult($dataArray);
         $dataResut->save();
       
//         var_dump($dataResut->weight);die();
        return $dataResut;
    }

}
