<?php

namespace App\models\entities;

use Illuminate\Database\Eloquent\Model;

class DietMenu extends Model {

    protected $table = 'diet_menu';
    protected $fillable = [
        'name',
        'day',
        'week_no',
        'diet_meal_id',
        'diet_plan_id',
        'meal_time_id'
    ];

    public function dietMeal() {
        return $this->hasMany('App\models\entities\DietMeal');
    }

}
