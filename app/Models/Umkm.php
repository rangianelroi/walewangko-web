<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Import

class Umkm extends Model
{
    use HasFactory, SoftDeletes; // Tambahkan

    // Tambahkan properti $fillable sesuai migrasi
    protected $fillable = [
        'name',
        'kategori',
        'deskripsi',
        'thumbnail',
        'kisaran_harga', // Tambah ini
        'lokasi',        // Tambah ini
    ];

    // Tambahkan relasi "one-to-many" ke galeri
    public function fotos()
    {
        return $this->hasMany(UmkmFoto::class);
    }
}