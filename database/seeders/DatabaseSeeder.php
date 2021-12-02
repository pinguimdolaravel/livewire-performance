<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::factory()->create(['email' => 'pinguim@dolaravel.com', 'name' => 'Pinguim', 'password' => bcrypt('secret')]);
        User::factory(100)->create();

        foreach (User::all() as $user) {
            $user->update(['name' => $user->name . ' - ' . $user->id, 'email' => $user->id . '.' . $user->email]);
        }
    }
}
