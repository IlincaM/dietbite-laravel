<?php

namespace Services\Bmr;

use Entities;
use Entities\BmrActivity;
use Entities\BmrExercise;
use Entities\BmrResult;
use Illuminate\Http\Request;
use Repositories\Bmr\BmrResultRepository;
use Repositories\Bmr\bmrInterface ;

class BmrService {
    // Containing our bmrReusltRepository to make all our database calls to
    protected $bmrRepo;

    /**
     * Loads our $bmrRepo with the actual Repo associated with our pokemonInterface
     * 
     * @param bmrInterface $bmrRepo
     * @return BmrService
     */
    
    public function getDataFormBmr() {
        $data = array(
            'bmr_activity' => BmrActivity::all(),
            'bmr_exercise' => BmrExercise::all(),
        );
        return $data;
    }

    public function storeBmrData($data) {
$data= new BmrResultRepository();
$data->make();        
return $data;
    }

}
