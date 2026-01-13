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
        Schema::create('tentang_kami2s', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable(); // Main title (e.g., "Mengapa Memilih Kami?")
            $table->text('deskripsi')->nullable(); // Description
            
            // Icon 1 - with angka and deskripsi
            $table->string('icon1')->nullable(); // Icon 1 identifier/class
            $table->string('angka_icon1')->nullable(); // Icon 1 number/stat
            $table->string('deskripsi_icon1')->nullable(); // Icon 1 description
            
            // Icon 2 - with angka and deskripsi
            $table->string('icon2')->nullable(); // Icon 2 identifier/class
            $table->string('angka_icon2')->nullable(); // Icon 2 number/stat
            $table->string('deskripsi_icon2')->nullable(); // Icon 2 description
            
            // Icon 3 - with angka and deskripsi
            $table->string('icon3')->nullable(); // Icon 3 identifier/class
            $table->string('angka_icon3')->nullable(); // Icon 3 number/stat
            $table->string('deskripsi_icon3')->nullable(); // Icon 3 description
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentang_kami2s');
    }
};
