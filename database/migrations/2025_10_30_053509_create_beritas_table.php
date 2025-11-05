<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_berita_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
// database/migrations/xxxx_xx_xx_xxxxxx_create_berita_table.php

    public function up(): void
    {
        Schema::create('beritas', function (Blueprint $table) { // <--- UBAH INI
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique(); 
            $table->text('ringkasan')->nullable();
            $table->longText('isi_konten'); 
            $table->string('thumbnail'); 
            $table->foreignId('user_id')->constrained('users'); 
            $table->string('status')->default('published'); 
            $table->softDeletes(); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beritas'); // <--- UBAH INI JUGA
    }
};