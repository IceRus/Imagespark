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
        $users = (new UsersFilter($users, $request))->apply()->get();

        $cities = City::get();

        return view('welcome', [
            'users' => $users,
            'cities' => $cities
        ]);
    }
}
