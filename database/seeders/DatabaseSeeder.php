<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ChargingStation;
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
        User::create([
        'name' => 'Admin User',
        'email' => 'admin@bornes.com',
        'password' => bcrypt('password'),
        'role' => 'admin',
    ]);
         User::create([
        'name' => 'John Doe',
        'email' => 'user@bornes.com',
        'password' => bcrypt('password'),
        'role' => 'user',
    ]);
        

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        ChargingStation::insert([
        ['name' => 'Borne Paris Centre', 'latitude' => 48.8566, 'longitude' => 2.3522, 'connector_type' => 'Type2', 'is_available' => true, 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Borne Lyon Sud',    'latitude' => 45.7640, 'longitude' => 4.8357, 'connector_type' => 'CCS',   'is_available' => true, 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Borne Marseille',   'latitude' => 43.2965, 'longitude' => 5.3698, 'connector_type' => 'CHAdeMO','is_available' => false,'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
