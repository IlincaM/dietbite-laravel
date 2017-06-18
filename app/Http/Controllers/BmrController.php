<?php

namespace App\Http\Controllers;

use Request;
use Services\Bmr\BmrService;

class BmrController extends Controller {

    public function index() {
         $data=new BmrService();
        return view('layouts.index')->with('data',$data->getDataFormBmr());
    }
    public function storeBmrCalculation(){
       $data = new BmrService();
       var_dump($data);
    }

}
