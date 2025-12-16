<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class kategoriMakanan extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $primaryKey = 'id';
  protected $fillable = [
    'nama_kategori'
  ];
 
  public function resepMakanan()
  {
    return $this->hasMany(resepMakanan::class);
  }
}
