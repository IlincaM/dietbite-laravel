<?php

namespace App\models\entities;

use Illuminate\Database\Eloquent\Model;

class DietMeal extends Model {

    protected $table = 'diet_meals';
    protected $fillable = [
        'NDB_No_id'];

    public function abbrevFood() {
        return $this->hasMany('App\models\entities\AbbrevFood');
    }

    public function dietMenu() {
        return $this->hasMany('App\models\entities\DietMenu');
    }

}
