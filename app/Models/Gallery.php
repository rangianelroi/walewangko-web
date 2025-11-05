<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'category',
        'description',
        'image',
        'date',
    ];

    protected $casts = [
        'date' => 'date', // Otomatis konversi ke objek Carbon/Date
    ];
}