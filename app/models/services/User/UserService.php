<?php

namespace Services\User;

use App\User;
use Illuminate\Http\Request;

class UserService {

    /**
     * @var int
     */
    protected $userId;

    /**
     * 
     * @return type
     */
    public function makeUserFake() {
        return factory(User::class)->create();
    }

    public function getId() {
        return $this->userId;
    }

    public function setId($id) {
        $this->userId = $id;
    }

}
