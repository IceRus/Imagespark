<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function users(){
        return $this->belongsToMany('App\Models\User', 'users_cities', 'city_id', 'user_id');
    }
}
