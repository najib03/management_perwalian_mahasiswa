<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('mahasiswas', function (Blueprint $table) {
      $table->id();
      /**Biodata mahasisr */
      $table->foreignId('id_angkatan');
      $table->foreignId('id_dosen');
      $table->string('nim')->unique();
      $table->string('image');
      $table->string('nama_mahasiswa');
      $table->string('tgl_lahir');
      $table->string('email')->unique();
      $table->text('alamat');
      $table->text('domisili');
      $table->string('no_tlp_msh');
      $table->string('gender')->nullable();
      $table->boolean('active')->default(true);
      /**Biodata mahasisr */
      $table->string('nama_ort');
      $table->string('no_tlp_ort');
      $table->text('alamat_ort');
      $table->string('pekerjaan_ort');

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('mahasiswas');
  }
};
