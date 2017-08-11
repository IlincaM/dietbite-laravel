<?php

namespace App\models\entities;

use Illuminate\Database\Eloquent\Model;

class DietMeal extends Model {

    protected $table = 'diet_meals';
    protected $fillable = [
        'NDB_No_id',
        'meal_time_id'];

    public function abbrevFood() {
        return $this->hasMany('App\models\entities\AbbrevFood');
    }

    public function dietMenu() {
        return $this->belongsTo('App\models\entities\DietMenu');
    }
    public function dietDay() {
                return $this->belongsTo('App\models\entities\DietDays');

    }
}
