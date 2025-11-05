<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Import

class Penghargaan extends Model
{
    use HasFactory, SoftDeletes; // Tambahkan

    protected $fillable = [
        'name',
        'lokasi_tahun',
        'icon',
    ];
}