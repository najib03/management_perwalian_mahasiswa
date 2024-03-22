<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superAdmin@mail.com',
            'role_id' => 1, // Sesuaikan dengan ID role Super Admin
        ]);

        User::factory()->count(5)->create(['role_id' => 2]);
        User::factory()->count(5)->create(['role_id' => 3]);
    }
}
