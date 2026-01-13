<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Baliho;

class BalihoSeeder extends Seeder
{
    public function run(): void
    {
        $basePath = storage_path('app/public/img/baliho');
        $locations = array_filter(glob($basePath . '/*'), 'is_dir');
        
        // Koordinat GPS untuk setiap lokasi
        $coordinates = [
            '10. SINGARAJA' => 'https://www.google.com/maps?q=-8.1120,115.0882', // Singaraja
            '11. GIANYAR' => 'https://www.google.com/maps?q=-8.5420,115.3280', // Gianyar
            '12. JEMBRANA' => 'https://www.google.com/maps?q=-8.3760,114.6710', // Negara, Jembrana
            '7. MENGWI' => 'https://www.google.com/maps?q=-8.5667,115.1667', // Mengwi, Badung
            '8. DENPASAR' => 'https://www.google.com/maps?q=-8.6705,115.2126', // Denpasar
            '9. TABANAN' => 'https://www.google.com/maps?q=-8.5442,115.1219', // Tabanan
        ];
        
        $isFirst = true;
        foreach ($locations as $locationPath) {
            $judul = basename($locationPath);
            
            // Get koordinat atau default ke Denpasar
            $mapsLink = $coordinates[$judul] ?? 'https://www.google.com/maps?q=-8.6705,115.2126';
            
            $imageFiles = array_values(array_filter(scandir($locationPath), function($f) use ($locationPath) {
                return is_file($locationPath . '/' . $f) && !str_starts_with($f, '.');
            }));
            
            if (count($imageFiles) > 0) {
                $imagePaths = array_map(function($img) use ($judul) {
                    return 'img/baliho/' . $judul . '/' . $img;
                }, $imageFiles);
                
                \App\Models\Baliho::create([
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
