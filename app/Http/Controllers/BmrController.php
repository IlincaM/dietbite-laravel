<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Services\Bmr\BmrService;
use Repositories\Bmr\BmrResultRepository;
use Repositories\Bmr\bmrInterface;
use App\Http\Requests\StoreBmrResult;

class BmrController extends Controller {

    public function index() {
        $data = new BmrService();
        return view('layouts.index')->with('data', $data->getDataFormBmr());
    }

    public function storeBmrCalculation(StoreBmrResult $request, BmrService $bmrService) {
     $bmrResultObject = $bmrService->getBmrData($request);
            return response()->json($bmrResultObject,200);
//      return view('layouts.bmr-calculation')->with('bmrResult',$bmrResult);
       
    }

}
