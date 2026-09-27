<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanRuang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi balik ke Mahasiswa, Dosen, Matakuliah
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class);
    }
}