<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Services\Bmr\BmrService;
use Repositories\Bmr\BmrResultRepository;
use Repositories\Bmr\bmrInterface;

class BmrController extends Controller {

    public function index() {
        $data = new BmrService();
        return view('layouts.index')->with('data', $data->getDataFormBmr());
    }

    public function storeBmrCalculation(Request $request) {
        $data = new BmrService();
        $data->storeBmrData($data);
        var_dump($data);die();
       
    }

}
