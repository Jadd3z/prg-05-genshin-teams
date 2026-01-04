<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Admin John',
            'email' => 'johndoe@hr.nl',
            'password' => bcrypt('Rootrootroot'),
            'is_admin' => true, // This overrides the default(false) from your migration
        ]);

        // Call the new seeder to populate the characters table
        $this->call(CharactersSeeder::class);


    }
}
