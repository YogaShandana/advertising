<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TentangKami2;

class TentangKami2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TentangKami2::create([
            'judul' => 'Mengapa Memilih Kami?',
            'deskripsi' => 'Kami berkomitmen memberikan layanan periklanan luar ruang terbaik dengan jangkauan luas dan dampak maksimal untuk bisnis Anda.',
            'icon1' => 'bi-person-check',
            'angka_icon1' => '500+',
            'deskripsi_icon1' => 'Klien puas yang telah mempercayakan promosi bisnis mereka kepada kami.',
            'icon2' => 'bi-geo-alt',
            'angka_icon2' => '50+',
            'deskripsi_icon2' => 'Titik lokasi strategis tersebar di seluruh wilayah Bali dan sekitarnya.',
            'icon3' => 'bi-award',
            'angka_icon3' => '10+',
            'deskripsi_icon3' => 'Tahun pengalaman dalam industri periklanan dan media luar ruang.',
        ]);
    }
}
