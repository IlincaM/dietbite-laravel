<?php

namespace Entities;

use Illuminate\Database\Eloquent\Model;

class BmrResult extends Model {

    protected $table = 'bmr_results';
    protected $fillable = [
        'weight',
        'bmr_result',
        'goal_weight',
        'created_at',
        'updated_at',
        'user_id'
    ]; //<-- only the field names inside the array can be mass-assign
   public function user()
    {
        return $this->belongsTo('App\User');
    }
}
