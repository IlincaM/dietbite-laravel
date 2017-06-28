<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Services\User\UserService;
use Repositories\Bmr\BmrResultRepository;
use Services\Bmr\BmrService;
use App\Http\Requests\StoreBmrResult;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller {

    protected $userFake;

    public function __construct(UserService $userFake) {
        $this->userFake = $userFake;
    }

    public function index(UserService $userFake) {
        $userFake1 = $userFake->makeUserFake();
        return $userFake1;
    }

    public function storeBmrCalculationTest(StoreBmrResult $request, BmrService $bmrService, UserService $userService) {
        $bmrResultObject = $bmrService->getBmrData($request);
                var_dump( Auth::user());

        return view('layouts.test2')->with('bmrResultObject', $bmrResultObject);
    }

    public function indexForm() {
        $data = new BmrService();
        return view('layouts.test')->with('data', $data->getDataFormBmr());
    }

    public function testTest() {
        echo "<pre>";
        var_dump( Auth::user());
        return view('layouts.test3');
    }

}
