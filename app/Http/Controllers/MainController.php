<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Вывод Главной с фильтром
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, UsersFilter $filters)
    {
        $users = User::with('cities')->filter($filters)->get();

        $cities = City::get();

        return view('welcome', [
            'users' => $users,
            'cities' => $cities
        ]);
    }
}
