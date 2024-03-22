<?php

namespace Database\Seeders;

use App\Models\Bimbingan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BimbinganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    Bimbingan::factory()->count(10)->create();
    }
}
