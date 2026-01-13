<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroSection;

class HeroSectionSeeder extends Seeder
{
    public function run(): void
    {
        $heroSections = [
            [
                'page_name' => 'home',
                'judul' => 'Solusi Periklanan Luar Ruang Terbaik untuk Bisnis Anda',
                'deskripsi' => 'Jangkau lebih banyak pelanggan dengan solusi periklanan luar ruang yang efektif dan inovatif dari Tri Bhakti Advertising.',
                'gambar' => 'img/herosection/heroSectionHome.png'
            ],
            [
                'page_name' => 'tentang_kami',
                'judul' => 'Tentang Kami',
                'deskripsi' => 'Tri Bhakti Advertising adalah perusahaan periklanan luar ruang terkemuka yang berdedikasi untuk membantu bisnis Anda tumbuh melalui solusi promosi yang efektif dan inovatif.',
                'gambar' => 'img/herosection/tentangkami.webp'
            ],
            [
                'page_name' => 'videotron',
                'judul' => 'Videotron',
                'deskripsi' => 'Tampilkan iklan Anda dengan teknologi videotron modern yang menarik perhatian dan meningkatkan brand awareness.',
                'gambar' => 'img/herosection/videotron.webp'
            ],
            [
                'page_name' => 'baliho',
                'judul' => 'Baliho',
                'deskripsi' => 'Media iklan luar ruang berukuran besar yang efektif untuk meningkatkan visibilitas brand Anda di lokasi strategis.',
                'gambar' => 'img/herosection/baliho.jpg'
            ],
            [
                'page_name' => 'billboard',
                'judul' => 'Billboard',
                'deskripsi' => 'Solusi iklan billboard premium di lokasi strategis untuk jangkauan maksimal dan brand awareness yang tinggi.',
                'gambar' => 'img/herosection/billboard.webp'
            ],
            [
                'page_name' => 'kontak',
                'judul' => 'Hubungi Kami',
                'deskripsi' => 'Kami siap membantu Anda menemukan solusi periklanan luar ruang yang tepat untuk bisnis Anda. Hubungi kami sekarang!',
                'gambar' => 'img/herosection/kontak.jpg'
            ],
        ];

        foreach ($heroSections as $heroSection) {
            HeroSection::updateOrCreate(
                ['page_name' => $heroSection['page_name']],
                $heroSection
            );
        }
    }
}
