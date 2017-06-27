<?php

namespace Services\User;
use App\User;
use Illuminate\Http\Request; 

class UserService {
public function makeUserFake(){
    $userFake= factory(User::class)->create();
    return $userFake;
}
    
}
