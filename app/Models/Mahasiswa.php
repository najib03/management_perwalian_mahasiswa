<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
  use HasFactory;
  protected $fillable = [
    /**Biodata mahasisr */
    'id_angkatan',
    'id_dosen',
    'nim',
    'image',
    'nama_mahasiswa',
    'tgl_lahir',
    'email',
    'alamat',
    'domisili',
    'no_tlp_msh',
    'gender',
    'active',
    /**Biodata mahasisr */
    'nama_ort',
    'no_tlp_ort',
    'alamat_ort',
    'pekerjaan_ort',

  ];
  public function angkatan()
  {
    return $this->belongsTo(Angkatan::class, 'id_angkatan');
  }

  public function bimbingans()
  {
    return $this->hasMany(Bimbingan::class, 'id_dosen');
  }
}
