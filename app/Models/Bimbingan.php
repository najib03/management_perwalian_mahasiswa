<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimbingan extends Model
{
  use HasFactory;
  protected $fillable = [
    'id_semester',
    'id_dosen',
    'id_mahasiswa',
    'id_thn_ajaran',
    'no_telp',
    'konsultasi',
    'tgl_konsultasi',
    'status'
  ];

  public function mahasiswa()
  {
    return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
  }

  public function dosen()
  {
    return $this->belongsTo(Dosen::class, 'id_doses');
  }
  public function semester()
  {
    return $this->belongsTo(Semester::class, 'id_semester');
  }

  public function tahunAjaran()
  {
    return $this->belongsTo(Ajaran::class, 'id_thn_ajaran');
  }
}
