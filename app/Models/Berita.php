<?php

// app/Models/Berita.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berita extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'judul',
        'ringkasan',
        'slug',
        'isi_konten',
        'thumbnail',
        'user_id',
        'status',
    ];

    // Relasi ke tabel User (penulis berita)
    public function penulis()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}