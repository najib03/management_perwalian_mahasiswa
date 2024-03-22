<?php

namespace Database\Factories;

use App\Models\Angkatan;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
  protected $model = Mahasiswa::class;

  public function definition()
  {
    $angkatan = Angkatan::inRandomOrder()->first();
    $dosen = Dosen::inRandomOrder()->first();

    return [
      'id_angkatan' => $angkatan ? $angkatan->id : Angkatan::factory()->create()->id,
      'id_dosen' => $dosen ? $dosen->id : Dosen::factory()->create()->id,
      'nim' => $this->faker->unique()->numerify('##########'),
      'image' => $this->faker->imageUrl(),
      'nama_mahasiswa' => $this->faker->name(),
      'tgl_lahir' => $this->faker->date(),
      'email' => $this->faker->unique()->safeEmail(),
      'alamat' => $this->faker->address(),
      'domisili' => $this->faker->city(),
      'no_tlp_msh' => $this->faker->phoneNumber(),
      'gender' => $this->faker->randomElement(['L', 'P']),
      'active' => $this->faker->boolean(),
      'nama_ort' => $this->faker->name(),
      'no_tlp_ort' => $this->faker->phoneNumber(),
      'alamat_ort' => $this->faker->address(),
      'pekerjaan_ort' => $this->faker->jobTitle(),
    ];
  }
}
