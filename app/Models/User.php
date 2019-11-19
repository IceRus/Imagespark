<?php

namespace App\Models;

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
        'name', 'second_name', 'last_name', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * Определить отношение «многие ко многим», user с cities в отдельной таблице users_city
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cities()
    {
        return $this->belongsToMany('App\Models\City', 'users_cities', 'user_id', 'city_id');
    }

    /**
     *  Делаем скоуп, для фильтра
     *
     * @param $query
     * @param $filters
     * @return mixed
     */
    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }

}
