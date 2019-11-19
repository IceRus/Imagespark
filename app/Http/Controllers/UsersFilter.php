<?php

namespace App\Http\Controllers;

class UsersFilter extends QueryFilter
{
    public function fullname($value)
    {
        $fullname = explode(" ", $value);
        $name_parametrs = ['name', 'last_name'];
        foreach ($fullname as $fKey => $fName) {
            $this->builder->where("second_name", 'like', "%$fullname[$fKey]%");
            if(count($fullname) > 1){
                foreach ($name_parametrs as $name_parametr) {
                    $this->builder->orWhere("$name_parametr", 'like', "%$fullname[$fKey]%");
                }
            }
        }
    }

    public function city($value)
    {
        $this->builder->whereHas('cities', function ($query) use ($value) {
            $query->where('city_id', $value);
        });
    }

}
