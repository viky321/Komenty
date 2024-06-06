<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(5)->create();

        // Create a specific user with the given attributes.
        if (!User::where('email', 'test@example.com')->exists()) {
            // Create a specific user with the given attributes.
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
        ]);
    }
}
}

