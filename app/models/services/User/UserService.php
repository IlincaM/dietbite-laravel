<?php

namespace Services\User;

use App\User;
use Illuminate\Http\Request;

class UserService {
<<<<<<< HEAD
=======

>>>>>>> bb448ead086f014314a86400a11c23a97056b3cb

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
<<<<<<< HEAD
    }

    public function getId() {
        return $this->userId;
    }

    public function setId($id) {
        $this->userId = $id;
    }

=======
    }

>>>>>>> bb448ead086f014314a86400a11c23a97056b3cb
}
