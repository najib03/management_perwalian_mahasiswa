<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
  use HasFactory;
  protected $fillable = ['nama_semester', 'id_thn_ajaran'];

  public function tahunAjaran()
  {
    return $this->belongsTo(Ajaran::class, 'id_tahun_ajaran');
  }

  public function bimbingan()
  {
    return $this->belongsTo(Bimbingan::class, 'id_bimbingan');
  }
}
