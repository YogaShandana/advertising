<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Billboard;

class BillboardSeeder extends Seeder
{
    public function run(): void
    {
        $basePath = storage_path('app/public/img/billboard');
        $locations = array_filter(glob($basePath . '/*'), 'is_dir');
        
        // Koordinat GPS untuk setiap lokasi
        $coordinates = [
            '1. TUBAN BADUNG' => '-8.7467, 115.1673', // Tuban, dekat Bandara
            '2. SUNSET ROAD' => '-8.6918, 115.1708', // Sunset Road, Kuta
            '3. SIMPANG SIUR' => '-8.6644, 115.2164', // Simpang Siur, Denpasar
            '4. KUTA' => '-8.7185, 115.1689', // Kuta
            '5. CANGGU' => '-8.6482, 115.1386', // Canggu
            '6. JIMBARAN & NUSA DUA' => '-8.7971, 115.1772', // Jimbaran
        ];
        
        $isFirst = true;
        foreach ($locations as $locationPath) {
            $judul = basename($locationPath);
            
            // Get koordinat atau default ke Denpasar
            $mapsLink = $coordinates[$judul] ?? '-8.6705, 115.2126';
            
            $imageFiles = array_values(array_filter(scandir($locationPath), function($f) use ($locationPath) {
                return is_file($locationPath . '/' . $f) && !str_starts_with($f, '.');
            }));
            
            if (count($imageFiles) > 0) {
                $imagePaths = array_map(function($img) use ($judul) {
                    return 'img/billboard/' . $judul . '/' . $img;
                }, $imageFiles);
                
                \App\Models\Billboard::create([
                    'judul' => $judul,
                    'link_maps' => $mapsLink,
                    'deskripsi' => 'Lokasi strategis di ' . $judul,
                    'images' => $imagePaths,
                    'is_featured' => $isFirst,
                ]);
                
                $isFirst = false;
            }
        }
    }
}
