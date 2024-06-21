<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Marco',
            'email' => 'marco.vise@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => 'administrador',
        ]);
    }
}
