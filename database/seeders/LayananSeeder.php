<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Baliho;
use App\Models\Billboard;
use App\Models\Videotron;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Baliho Data
        $balihos = [
            ['lokasi' => '7. MENGWI', 'judul' => 'MENGWI'],
            ['lokasi' => '8. DENPASAR', 'judul' => 'DENPASAR'],
            ['lokasi' => '9. TABANAN', 'judul' => 'TABANAN'],
            ['lokasi' => '10. SINGARAJA', 'judul' => 'SINGARAJA'],
            ['lokasi' => '11. GIANYAR', 'judul' => 'GIANYAR'],
            ['lokasi' => '12. JEMBRANA', 'judul' => 'JEMBRANA'],
        ];

        foreach ($balihos as $data) {
            Baliho::create([
                'judul' => $data['judul'],
                'lokasi' => $data['lokasi'],
                'deskripsi' => 'Lokasi strategis di ' . $data['judul'] . ', cocok untuk meningkatkan branding bisnis Anda.',
                'link_maps' => '-8.650000, 115.216667', // Dummy coordinates
                'is_featured' => false,
            ]);
        }

        // Billboard Data
        $billboards = [
            ['lokasi' => '1. TUBAN BADUNG', 'judul' => 'TUBAN BADUNG'],
            ['lokasi' => '2. SUNSET ROAD', 'judul' => 'SUNSET ROAD'],
            ['lokasi' => '3. SIMPANG SIUR', 'judul' => 'SIMPANG SIUR'],
            ['lokasi' => '4. KUTA', 'judul' => 'KUTA'],
            ['lokasi' => '5. CANGGU', 'judul' => 'CANGGU'],
            ['lokasi' => '6. JIMBARAN & NUSA DUA', 'judul' => 'JIMBARAN & NUSA DUA'],
        ];

        foreach ($billboards as $data) {
            Billboard::create([
                'judul' => $data['judul'],
                'lokasi' => $data['lokasi'],
                'deskripsi' => 'Billboard premium di kawasan ' . $data['judul'] . ' dengan trafik tinggi.',
                'link_maps' => '-8.720000, 115.170000', // Dummy coordinates
                'is_featured' => false,
            ]);
        }

        // Videotron Data
        $videotrons = [
            ['lokasi' => '13. GATOT SUBROTO', 'judul' => 'GATOT SUBROTO'],
        ];

        foreach ($videotrons as $data) {
            Videotron::create([
                'judul' => $data['judul'],
                'lokasi' => $data['lokasi'],
                'deskripsi' => 'Videotron modern di ' . $data['judul'] . ' untuk iklan yang lebih dinamis dan menarik.',
                'link_maps' => '-8.630000, 115.220000', // Dummy coordinates
                'is_featured' => false,
            ]);
        }
    }
}
