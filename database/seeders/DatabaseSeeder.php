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
        \App\Models\User::factory(5)->create();
        \App\Models\User::factory(5)->create(['role'=>'nurse']);
        \App\Models\User::factory(5)->create(['role'=>'doctor']);

        \App\Models\Patient::factory(20)
        ->hasBloodPressures(1)
        ->create();
    }
}
