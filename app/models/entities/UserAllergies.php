<?php

namespace App\models\entities;

use Illuminate\Database\Eloquent\Model;

class UserAllergies extends Model {

    protected $table = 'user-allergies';

   
    public function dietPlan() {
        return $this->belongsTo('App\models\entities\DietPlan');
    }

}
