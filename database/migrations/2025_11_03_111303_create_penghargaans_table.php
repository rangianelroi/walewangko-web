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
        Schema::create('penghargaans', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Untuk "Nama Penghargaan"
            $table->string('lokasi_tahun'); // Untuk "Bali, 2020" (menggantikan 'goal')
            $table->string('icon'); // Untuk gambar piala
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penghargaans');
    }
};
