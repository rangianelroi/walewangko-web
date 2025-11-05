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
        Schema::table('umkms', function (Blueprint $table) {
            $table->string('kisaran_harga')->nullable()->after('deskripsi');
            $table->string('lokasi')->nullable()->after('kisaran_harga');
        });
    }

    public function down(): void
    {
        Schema::table('umkms', function (Blueprint $table) {
            $table->dropColumn(['kisaran_harga', 'lokasi']);
        });
    }
};

