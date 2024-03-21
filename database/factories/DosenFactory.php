<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'image' => fake()->imageUrl(),
      'nip' => fake()->unique()->numerify('##########'),
      'name' => fake()->name(),
      'email' => fake()->unique()->safeEmail,
      'no_tlp' => fake()->phoneNumber,
      'alamat' => fake()->address,
      'gender' => fake()->randomElement(['Laki-Laki', 'Perempuan']),
    ];
  }
}
