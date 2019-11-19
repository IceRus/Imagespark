<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * Определить отношение «многие ко многим», cities c user в отдельной таблице users_city
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(){
        return $this->belongsToMany('App\Models\User', 'users_cities', 'city_id', 'user_id');
    }
}
