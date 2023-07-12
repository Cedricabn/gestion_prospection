<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExempleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Administrateur',
            'email' => 'Admine@example.com',
            'password' => Hash::make('admin123'),
            'administrateur'=> 1
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'Admine@gmail.com',
            'password' => Hash::make('admin123'),
            'administrateur'=> 1
        ]);
    }
}
