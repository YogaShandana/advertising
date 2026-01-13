<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TentangKami1;

class TentangKami1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TentangKami1::create([
            'gambar' => null, // Will use default image from blade
            'judul' => 'SIAPA KAMI',
            'sub_judul' => "Mitra Strategis untuk\nPertumbuhan Bisnis Anda",
            'deskripsi' => "Tri Bhakti Advertising adalah perusahaan periklanan luar ruang yang berfokus pada penyediaan titik-titik lokasi strategis yang memberikan dampak maksimal bagi brand Anda.\n\nDengan pengalaman lebih dari satu dekade, kami memahami bahwa setiap brand memiliki cerita unik. Misi kami adalah membantu Anda menceritakan kisah tersebut kepada audiens yang tepat, di waktu yang tepat, dan melalui medium yang paling efektif. Kami memadukan keahlian lokasi dengan teknologi visual terkini.",
            'icon1' => 'bi-stars',
            'judul_icon1' => 'Solusi Kreatif',
            'deskripsi_icon1' => 'Inovasi tanpa batas',
            'icon2' => 'bi-shield-check',
            'judul_icon2' => 'Legalitas Terjamin',
            'deskripsi_icon2' => 'Aman & Terpercaya',
        ]);
    }
}
