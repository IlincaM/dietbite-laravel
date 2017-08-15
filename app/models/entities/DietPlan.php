<?php

namespace App\models\entities;

use Illuminate\Database\Eloquent\Model;

class DietPlan extends Model {

    protected $table = 'diet_plans';
    protected $fillable = [
        'name',
        'weeks',
        'start_date',
        'end_date'
    ];

    /**
     * The diet plan that belong to the diet menu.
     */
    public function dietMenu() {
        return $this->belongsTo('App\models\entities\DietMenu');
    }

    public function dietPlanType() {
        return $this->hasMany('App\models\entities\DietPlanType');
    }

    /**
     * Get the user that owns the diet plan.
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function dietWeeksPlan() {
        return $this->belongsTo('App\models\entities\DietWeeksPlan');
    }

}
