<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Truncate tables to remove old dummy data
        DB::table('balihos')->truncate();
        DB::table('billboards')->truncate();
        DB::table('videotrons')->truncate();
        
        // Update balihos table
        Schema::table('balihos', function (Blueprint $table) {
            $table->dropColumn(['foto1', 'foto2', 'foto3']);
            $table->string('lokasi')->after('judul');
        });
        
        // Update billboards table
        Schema::table('billboards', function (Blueprint $table) {
            $table->dropColumn(['foto1', 'foto2', 'foto3']);
            $table->string('lokasi')->after('judul');
        });
        
        // Update videotrons table
        Schema::table('videotrons', function (Blueprint $table) {
            $table->dropColumn(['foto1', 'foto2', 'foto3']);
            $table->string('lokasi')->after('judul');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reverse balihos table
        Schema::table('balihos', function (Blueprint $table) {
            $table->dropColumn('lokasi');
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
        });
        
        // Reverse billboards table
        Schema::table('billboards', function (Blueprint $table) {
            $table->dropColumn('lokasi');
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
        });
        
        // Reverse videotrons table
        Schema::table('videotrons', function (Blueprint $table) {
            $table->dropColumn('lokasi');
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
        });
    }
};
