<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(30)->create();
        \App\Models\User::factory(35)->create(['role'=>'nurse']);
        \App\Models\User::factory(35)->create(['role'=>'doctor']);

        \App\Models\Patient::factory(50)
        ->hasBloodPressures(1)
        ->create();
    }
}
