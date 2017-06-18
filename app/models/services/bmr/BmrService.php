<?php
namespace Services\Bmr;
use Entities;
use Entities\BmrActivity;
use Entities\BmrExercise;
use Entities\BmrResult;
use Illuminate\Http\Request;
class BmrService{
    public function getDataFormBmr(){
         $data = array(
            'bmr_activity'  => BmrActivity::all(),
            'bmr_exercise' => BmrExercise::all(),
            
        );
            return $data;
    }
    public function storeBmrData(Request $request){
$data= $request;
var_dump($request);
    }
}