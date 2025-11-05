<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('umkm_fotos', function (Blueprint $table) {
            $table->id();
            // Ini adalah "kunci" yang menghubungkan foto ke UMKM-nya
            $table->foreignId('umkm_id')->constrained('umkms')->onDelete('cascade');
            $table->string('foto_path'); // Path ke file foto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkm_fotos');
    }
};
