<?php

namespace Services\User;

use App\User;
use Illuminate\Http\Request;

class UserService {
protected $userId;

    public function makeUserFake() {
        $userFake = factory(User::class)->create();
        return $userFake;
    }
  public function getId()
    {
        return $this->userId;
    }

    public function setId($id)
    {
        $this->userId = $id;
    }
}
