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
        \App\Models\User::factory()->create(['email' => 'pinguim@dolaravel.com', 'name' => 'Pinguim', 'password' => bcrypt('secret')]);
        \App\Models\User::factory(100)->create();
    }
}
