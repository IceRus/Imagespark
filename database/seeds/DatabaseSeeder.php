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
        factory(App\Models\City::class, 15)->create();

        factory(App\Models\User::class, 100)->create()->each(function ($user) {
            factory(\App\Models\UsersCity::class)->create([
                'user_id' => $user->id
            ]);
        });
    }
}
