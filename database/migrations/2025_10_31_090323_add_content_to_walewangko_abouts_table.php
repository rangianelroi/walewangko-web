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
        // Gunakan Schema::table untuk MENGUBAH tabel yang sudah ada
        Schema::table('walewangko_abouts', function (Blueprint $table) {
            $table->text('content')->nullable()->after('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Ini adalah jawaban atas pertanyaan Anda
        Schema::table('walewangko_abouts', function (Blueprint $table) {
            $table->dropColumn('content');
        });
    }
};