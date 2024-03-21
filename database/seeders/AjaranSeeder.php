<?php

namespace Database\Seeders;

use App\Models\Ajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ajaran::factory()->count(10)->create();
    }
}
