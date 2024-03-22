<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ajaran>
 */
class AjaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      // Generate a random year for the start year
      $startYear = $this->faker->numberBetween(2000, 2021);

      // Generate the end year by adding 1 to the start year
      $endYear = $startYear + 1;

      // Combine the start year and end year in the desired format
      $nama = "{$startYear}-{$endYear}";

      return [
        'nama' => $nama,
      ];
    }
}
