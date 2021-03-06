<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','confirmed'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
       public function bmrResults()
    {
        return $this->hasMany('Entities\BmrResult','user_id');
    }
    public function dietMeals()
    {
        return $this->hasMany('App\models\entities\DietMeals');
    }
     public function dietPlans()
    {
        return $this->hasMany('App\models\entities\DietPlan');
    }
}

