<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class DietDays extends Model {

    protected $table = 'diet_days';
    protected $fillable = [
        'day_no',
        'date'
    ];

    public function dietWeeksPlan() {
        return $this->belongsTo('App\models\entities\DietWeeksPlan');
    }

}
