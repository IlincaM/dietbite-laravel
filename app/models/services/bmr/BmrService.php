<?php
namespace Services\Bmr;
use Entities;
use Entities\BmrActivity;
use Entities\BmrExercise;

class BmrService{
    public function getDataFormBmr(){
         $data = array(
            'bmr_activity'  => BmrActivity::all(),
            'bmr_exercise' => BmrExercise::all(),
            
        );

        return $data;
    }
}