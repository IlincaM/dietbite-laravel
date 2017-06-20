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

    public function storeBmrCalculation(Request $request, BmrService $bmrService) {

        $bmrService->getBmrData($request);
    }

}
