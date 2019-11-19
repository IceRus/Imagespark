<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Для теста
//        $this->call(CityTableSeeder::class);
//        $this->call(UsersTableSeeder::class);
//        $this->call(UsersCityTableSeeder::class);

        factory(App\Models\City::class, 15)->create();
        factory(App\Models\UsersCity::class, 100)->create();

    }
}
