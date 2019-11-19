<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::with('cities');

        if($request->has('fullname')){
            if(!empty($request->fullname)) {
                $fullname = explode(" ", $request->fullname);
                $name_parametrs = ['second_name', 'name', 'last_name'];

                foreach ($fullname as $fKey => $fName){
                    if(!empty($fullname[$fKey])) {
                        foreach ($name_parametrs as $name_parametr){
                            $users->orWhere("$name_parametr", 'like',"%$fullname[$fKey]%");
                        }
                    }
                }
            }
        }

        if($request->has('city')){
            if(!empty($request->city)){
                $users->whereHas('cities', function ($query) use ($request){
                    $query->where('city_id', $request->city);
                });
            }
        }

        $users = $users->get();

        $cities = City::get();

        return view('welcome', [
            'users' => $users,
            'cities' => $cities
        ]);
    }
}
