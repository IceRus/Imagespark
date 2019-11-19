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

        if($request->has('city')){
            $users->whereHas('cities', function ($query) use ($request){
               $query->where('city_id', $request->city);
            });
        }

        $users = $users->get();

        $cities = City::get();

        return view('welcome', [
            'users' => $users,
            'cities' => $cities
        ]);
    }
}
