<?php

namespace Database\Seeders;

use App\Models\Formation;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->has(Formation::factory(6))->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => "qwertyuiop",
            "role_id"=>3
        ]);
        Role::create([
            'name' => 'Admin'
        ]);  Role::create([
            'name' => 'Apprenant'
        ]);  Role::create([
            'name' => 'Formateur'
        ]);
        User::factory(10)->has(Formation::factory(5))->state(["role_id"=>3])->create();
    }
    
}
