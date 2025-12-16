<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class resepMakanan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "resep_makanan";
    protected $fillable = [
        'nama_resep',
        'id_kategori_makanan',
        'deskripsi',
    ];

    public function kategoriMakanan()
    {
        return $this->belongsTo(kategoriMakanan::class);
    }
}
