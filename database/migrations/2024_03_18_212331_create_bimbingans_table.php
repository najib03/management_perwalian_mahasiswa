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
    Schema::create('bimbingans', function (Blueprint $table) {
      $table->id();
      $table->foreignId('id_semester');
      $table->foreignId('id_dosen');
      $table->foreignId('id_mahasiswa');
      $table->foreignId('id_thn_ajaran');
      $table->string('no_telp');
      $table->string('konsultasi');
      $table->string('tgl_konsultasi');
      $table->boolean('status')->default(true);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('bimbingans');
  }
};
