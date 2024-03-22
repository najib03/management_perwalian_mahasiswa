<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $fillable= [
      'nip',
      'name',
      'email',
      'no_tlp',
      'alamat',
      'gender',
      'image'
    ];
  public function bimbingans()
  {
    return $this->hasMany(Bimbingan::class);
  }
}
