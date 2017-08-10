<?php

namespace App\models\entities;

use Illuminate\Database\Eloquent\Model;

class AbbrevFood extends Model
{
        protected $table = 'ABBREV';
        
         public function dietMeal() {
        return $this->belongsTo('App\models\entities\DietMeal');
    }

}
