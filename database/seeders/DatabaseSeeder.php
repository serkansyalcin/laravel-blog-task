<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'serkan',
                'email' => 'serkan@example.com',
                'password' => Hash::make('admin123'),
                'email_verified_at' => Now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'password' => Hash::make('secret456'),
                'email_verified_at' => Now(),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
