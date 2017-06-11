<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Services\Bmr\BmrService;

class BmrController extends Controller {

    public function index() {
         $data=new BmrService();
        return view('layouts.index')->with('data',$data->getDataFormBmr());
    }

}
