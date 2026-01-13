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
        Schema::create('kontaks', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable(); // Main title
            $table->string('sub_judul')->nullable(); // Subtitle
            $table->text('deskripsi')->nullable(); // Description
            
            // Alamat Kantor
            $table->string('icon_alamat')->nullable();
            $table->string('judul_alamat')->nullable();
            $table->text('deskripsi_alamat')->nullable();
            
            // Telepon & Fax
            $table->string('icon_telepon')->nullable();
            $table->string('judul_telepon')->nullable();
            $table->text('deskripsi_telepon')->nullable();
            
            // Email
            $table->string('icon_email')->nullable();
            $table->string('judul_email')->nullable();
            $table->string('deskripsi_email')->nullable();
            
            // Direktur
            $table->string('icon_direktur')->nullable();
            $table->string('judul_direktur')->nullable();
            $table->text('deskripsi_direktur')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontaks');
    }
};
