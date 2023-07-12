<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\User::factory()->create([
            'name' => 'Administrateur',
            'email' => 'Admin@example.com',
            'password' => Hash::make('admin123'),
            'administrateur'=> 1
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'Admin@gmail.com',
            'password' => Hash::make('admin123'),
            'administrateur'=> 1
        ]);
        DB::table("prospects")->insert([
           [ 'agent_name'=>'ABOBI',
            'client_name'=>'ABIBI',
            'client_address'=>'Cotonou',
            'date'=>'2023-02-10',
            'start_time'=>'15:00:00',
            'end_time'=>'17:00:00',
            'duration'=>'120',
            'product'=>'Chaise',
            'client_observation'=>'ok',
            'sale_concluded'=>1],

            [ 'agent_name'=>'AROBI',
            'client_name'=>'ARIBI',
            'client_address'=>'Cotonou',
            'date'=>'2023-02-12',
            'start_time'=>'15:00:00',
            'end_time'=>'17:00:00',
            'duration'=>'120',
            'product'=>'Chaise',
            'client_observation'=>'okii',
            'sale_concluded'=>0],
            
        
        
        ]);
    }
}
