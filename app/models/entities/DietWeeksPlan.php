<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class DietWeeksPlan extends Model
{
        protected $table = 'diet_weeks_plan';
         protected $fillable = [
        'calories',
        'diet_plan_id'
    ];
 public function dietPlan() {
        return $this->belongsTo('App\models\entities\DietPlan');
    }
    public function dietDays() {
        return $this->hasMany('App\models\entities\DietWeeks');
    }
}
