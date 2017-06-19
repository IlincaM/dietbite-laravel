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

  
//    public function make(Request $request) {
//        $data = new BmrResult();
//        $data->age = $request->age;
//        $data->weight = $request->weight;
//        return $data;
//    }
 // Our Eloquent  model
    protected $bmrResulModel;
    
     /**
    * Setting our class $bmrResulModel to the injected model
    * 
    * @param Model $bmrResult
    * @return BmrResultRepository
    */
  
     public function getDataFormBmr() {
        $data = array(
            'bmr_activity' => BmrActivity::all(),
            'bmr_exercise' => BmrExercise::all(),
        );
        var_dump($data);die();
        return $data;
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function make(Request $request) {
        $data = new BmrResult();
        $data->age = $request->age;

        $data->weight = $request->weight;
        return $data;
    }
}
