<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Services\Bmr\BmrService;
use Repositories\Bmr\BmrResultRepository;
use Repositories\Bmr\BmrInterface;
use App\Http\Requests\StoreBmrResult;
use Khill\Lavacharts\Lavacharts;
use App\models\entities\Allergies;

class BmrController extends Controller {

    public function index() {
        $data = new BmrService();
        $allergies= Allergies::all();

             return view('layouts.index', ['allergies' => $allergies , 'data' => $data->getDataFormBmr()]);

    }

    public function storeBmrCalculation(StoreBmrResult $request, BmrService $bmrService) {
        $bmrResultObject = $bmrService->getBmrData($request);
        return response()->json($bmrResultObject, 200);
//      return view('layouts.bmr-calculation')->with('bmrResult',$bmrResult);
    }

}
