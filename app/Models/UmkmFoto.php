<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UmkmFoto extends Model
{
    protected $fillable = ['umkm_id', 'foto_path'];

    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }
}
