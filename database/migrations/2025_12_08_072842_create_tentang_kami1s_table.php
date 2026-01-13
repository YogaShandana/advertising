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
        Schema::create('tentang_kami1s', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable(); // Image path
            $table->string('judul')->nullable(); // Title (e.g., "SIAPA KAMI")
            $table->string('sub_judul')->nullable(); // Subtitle
            $table->text('deskripsi')->nullable(); // Description with multiple paragraphs
            
            // Icon 1 - with title and description
            $table->string('icon1')->nullable(); // Icon 1 identifier/class
            $table->string('judul_icon1')->nullable(); // Icon 1 title
            $table->string('deskripsi_icon1')->nullable(); // Icon 1 description
            
            // Icon 2 - with title and description
            $table->string('icon2')->nullable(); // Icon 2 identifier/class
            $table->string('judul_icon2')->nullable(); // Icon 2 title
            $table->string('deskripsi_icon2')->nullable(); // Icon 2 description
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentang_kami1s');
    }
};
