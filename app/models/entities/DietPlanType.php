<?php

namespace App\models\entities;

use Illuminate\Database\Eloquent\Model;

class DietPlanType extends Model {

    protected $table = 'diet_plan_type';

    /**
     * The diet plan type that belong to the diet plan.
     */
    public function dietPlans() {
        return $this->belongsToMany('App\models\entities\DietPlan');
    }

}
