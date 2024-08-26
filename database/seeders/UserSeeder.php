<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'testuser',
            'password' => Hash::make('password123'),
            'imagen' => 'path/to/image.jpg',
            'nombre' => 'Test User',
            'telefono' => '1234567890',
            'is_active' => true,
        ]);
    }
}
