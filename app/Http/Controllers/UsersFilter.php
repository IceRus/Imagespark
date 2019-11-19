<?php

namespace App\Http\Controllers;

class UsersFilter extends QueryFilter
{
    /**
     * Фильтр по Фио
     *
     * @param $value
     */
    public function fullname($value)
    {
        $fullname = explode(" ", $value);
        $name_parametrs = ['name', 'last_name'];
        foreach ($fullname as $fKey => $fName) {
            $this->query->where("second_name", 'like', "%$fullname[$fKey]%");
            if(count($fullname) > 1){
                foreach ($name_parametrs as $name_parametr) {
                    $this->query->orWhere("$name_parametr", 'like', "%$fullname[$fKey]%");
                }
            }
        }
    }

    /**
     * Фильтр по городам
     *
     * @param $value
     */
    public function city($value)
    {
        $this->query->whereHas('cities', function ($query) use ($value) {
            $query->where('city_id', $value);
        });
    }

}
