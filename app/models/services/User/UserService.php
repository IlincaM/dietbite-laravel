<?php

namespace Services\User;

use App\User;
use Illuminate\Http\Request;

class UserService {

    /**
     * 
     * @return type
     */
    public function makeUserFake() {
        return factory(User::class)->create();
    }



    

}
