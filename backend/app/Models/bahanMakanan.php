<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bahanMakanan extends Model
{
    protected $table = 'bahan_makanan';
    protected $fillable = [
        'nama_bahan',
        'satuan'
    ];

    public function resepMakanan()
    {
        return $this->belongsTo(resepMakanan::class, 'resep_bahan')->withPivot('jumlah')->withTimestamps();
    }
}
