<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Agus Bram Admin',
            'email' => 'agusbram@hotmail.com',
            'password' => Hash::make('bram123'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Santi Ayu',
            'email' => 'santiayu@hotmail.com',
            'password' => Hash::make('ayu123'),
            'role' => 'kasir'
        ]);
    }
}
