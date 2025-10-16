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
        // Jika user dengan email ini belum ada, buat
        User::updateOrCreate(
            ['email' => 'test@example.com'], // cari berdasarkan email
            [
                'username' => 'Test User',
                'password' => Hash::make('password'),
            ]
        );
    }
}
