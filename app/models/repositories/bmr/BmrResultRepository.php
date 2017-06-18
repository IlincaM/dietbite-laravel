<?php
namespace Repositories\Bmr;
use Illuminate\Database\Eloquent\Model;
use Request;
use stdClass;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BmrResultRepository
 *Bmr repository, containing 
 *commonly used queries
 * @author ilinca
 */
class BmrResultRepository {
    //Our Eloquent BmrResult model
    
    
    protected $bmrResultModel;
    
    /**
    * Setting our class $bmrResultModel to the injected model
    * 
    * @param Model $bmrResult
    * @return BmrResultRepository
    */

    public function __construct(Model $bmrResult) {
        $this->$bmrResultModel = $bmrResult;
    }
    
    public function storeBmrCalculation(Request $request){
        $bmrResult = $this->bmrResultModel;
    
        return $bmrResult;
    }
}
