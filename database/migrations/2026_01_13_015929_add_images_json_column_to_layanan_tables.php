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
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Add images column to tables
        Schema::table('balihos', function (Blueprint $table) {
            $table->json('images')->nullable()->after('judul');
        });
        
        Schema::table('billboards', function (Blueprint $table) {
            $table->json('images')->nullable()->after('judul');
        });
        
        Schema::table('videotrons', function (Blueprint $table) {
            $table->json('images')->nullable()->after('judul');
        });

        // 2. Migrate existing data from folders to images column
        $this->migrateImages('balihos', 'baliho');
        $this->migrateImages('billboards', 'billboard');
        $this->migrateImages('videotrons', 'videotron');
        
        // 3. Drop lokasi column as it's no longer needed
        Schema::table('balihos', function (Blueprint $table) {
            $table->dropColumn('lokasi');
        });
        Schema::table('billboards', function (Blueprint $table) {
            $table->dropColumn('lokasi');
        });
        Schema::table('videotrons', function (Blueprint $table) {
            $table->dropColumn('lokasi');
        });
    }

    private function migrateImages($tableName, $folderName)
    {
        $records = DB::table($tableName)->get();
        
        foreach ($records as $record) {
            if (!empty($record->lokasi)) {
                $folderPath = public_path("img/{$folderName}/" . $record->lokasi);
                $images = [];
                
                if (is_dir($folderPath)) {
                    $files = glob($folderPath . '/*.{jpg,jpeg,png,JPG,JPEG,PNG}', GLOB_BRACE);
                    if ($files !== false) {
                        natsort($files);
                        foreach ($files as $file) {
                            // Store relative path suitable for Filament/Storage
                            // Filament usually expects paths relative to storage/app/public
                            // But since our files are in public/img/..., we'll store them as is
                            // later we will configure Filament to store new uploads to public/img/...
                            $images[] = "img/{$folderName}/" . $record->lokasi . '/' . basename($file);
                        }
                    }
                }
                
                if (!empty($images)) {
                    DB::table($tableName)
                        ->where('id', $record->id)
                        ->update(['images' => json_encode(array_values($images))]);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('balihos', function (Blueprint $table) {
            $table->dropColumn('images');
            $table->string('lokasi')->nullable();
        });
        
        Schema::table('billboards', function (Blueprint $table) {
            $table->dropColumn('images');
            $table->string('lokasi')->nullable();
        });
        
        Schema::table('videotrons', function (Blueprint $table) {
            $table->dropColumn('images');
            $table->string('lokasi')->nullable();
        });
    }
};
