<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Services\User\UserService;

class TestController extends Controller
{
    protected $userFake;
    
    public function __construct(UserService $userFake){
        $this->userFake= $userFake;
        
    }
    public function index(UserService $userFake) {
        $userFake1= $userFake->makeUserFake();
        return view('layouts.test')->with('userFake1', $userFake1);
        
    }
   public function getIdAttribute()
    {
        return $this->attributes[$this->primaryKey];
    }

    public function setIdAttribute($id)
    {
        $this->attributes[$this->primaryKey] = $userFake1->id;
    }

}
