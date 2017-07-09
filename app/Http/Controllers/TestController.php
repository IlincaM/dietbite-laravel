<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Services\User\UserService;
use Repositories\Bmr\BmrResultRepository;
use Services\Bmr\BmrService;
use App\Http\Requests\StoreBmrResult;
use Illuminate\Support\Facades\Auth;
use Repositories\Meals\MealsRepositories;
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
        var_dump(Auth::user());

        return view('layouts.test2')->with('bmrResultObject', $bmrResultObject);
    }

    public function indexForm() {
         if (Auth::user()) {
            var_dump(Auth::user()->id);
        } else {
         $userService=new UserService();
         $fakeUser=$userService->makeUserFake();
        }
        $data = new MealsRepositories(); 
        $data= $data->test();
//        var_dump($data);
return view('layouts.test')->with('data', $data);
    }

    public function testTest() {
        
        if (Auth::user()) {
            
        } else {
         $userService=new UserService();
         $fakeUser=$userService->makeUserFake();
        }

        return view('layouts.test3');
    }
        public function testTest2(BmrResultRepository $bmrResultRepo, UserService $user) {
            $id= Auth::user()->id;
                            echo '<pre>';

            var_dump($user->getUserById($id));die();
                $bmrResultObject = $bmrResultRepo->getBmrResultById($id);
                echo '<pre>';
                var_dump($bmrResultObject);die();
        return view('layouts.test3')->with('bmrResultObject', $bmrResultObject);
    }

}

        
        
        
        
