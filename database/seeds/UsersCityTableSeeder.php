<?php

use Illuminate\Database\Seeder;

class UsersCityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\UsersCity::class, 10)->create();
    }
}
