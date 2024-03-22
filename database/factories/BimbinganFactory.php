<?php

namespace Database\Factories;

use App\Models\Ajaran;
use App\Models\Bimbingan;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Semester;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bimbingan>
 */
class BimbinganFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  protected $model = Bimbingan::class;

  public function definition()
  {
    $semester = Semester::inRandomOrder()->first();
    $dosen = Dosen::inRandomOrder()->first();
    $mahasiswa = Mahasiswa::inRandomOrder()->first();
    $tahunAjaran = Ajaran::inRandomOrder()->first();

    // $semester = Semester::inRandomOrder()->first();
    // $dosen = Dosen::inRandomOrder()->first();
    // $mahasiswa = Mahasiswa::inRandomOrder()->first();
    // $tahunAjaran = Ajaran::inRandomOrder()->first();

    // Random status sebagai string
    $statusString = $this->faker->randomElement(['pending', 'approved', 'rejected']);

    // Konversi status string menjadi boolean
    $statusBoolean = ($statusString === 'approved');
    return [
      'id_semester' => $semester ? $semester->id : Semester::factory()->create()->id,
      'id_dosen' => $dosen ? $dosen->id : Dosen::factory()->create()->id,
      'id_mahasiswa' => $mahasiswa ? $mahasiswa->id : Mahasiswa::factory()->create()->id,
      'id_thn_ajaran' => $tahunAjaran ? $tahunAjaran->id : TahunAjaran::factory()->create()->id,
      'no_telp' => $this->faker->phoneNumber(),
      'konsultasi' => $this->faker->sentence(),
      'tgl_konsultasi' => $this->faker->date(),
      'status' => $statusBoolean, // Menggunakan nilai boolean
    ];
  }
}
