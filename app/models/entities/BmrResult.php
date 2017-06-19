<?php

namespace Entities;

use Illuminate\Database\Eloquent\Model;

class BmrResult extends Model {

    protected $table = 'bmr_results';
    protected $fillable = [ 'weight']; //<-- only the field names inside the array can be mass-assign

}
