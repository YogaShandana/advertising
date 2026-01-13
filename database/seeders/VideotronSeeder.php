<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Videotron;

class VideotronSeeder extends Seeder
{
    public function run(): void
    {
        $basePath = storage_path('app/public/img/videotron');
        $locations = array_filter(glob($basePath . '/*'), 'is_dir');
        
        // Koordinat GPS untuk setiap lokasi
        $coordinates = [
            '13. GATOT SUBROTO' => '-8.6705, 115.2126', // Jl. Gatot Subroto, Denpasar
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
                    return 'img/videotron/' . $judul . '/' . $img;
                }, $imageFiles);
                
                \App\Models\Videotron::create([
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
