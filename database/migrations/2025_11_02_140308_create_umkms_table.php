<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_umkms_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Gunakan 'umkms' (plural) agar sesuai konvensi Model 'Umkm'
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->string('name');         // Nama UMKM (misal: "Kripik Pisang Mama Ani")
            $table->string('kategori');     // Kategori (misal: "Kuliner", "Kerajinan")
            $table->text('deskripsi');    // Deskripsi singkat
            $table->string('thumbnail');    // Foto produk
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};