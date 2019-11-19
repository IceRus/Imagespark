<?php

use Faker\Generator as Faker;

$factory->define(App\Models\UsersCity::class, function (Faker $faker) {
    $cityIds = App\Models\City::pluck('id')->toArray();
    return [
        'city_id' => array_random($cityIds)
    ];
});
