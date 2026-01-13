<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kontak;

class KontakSeeder extends Seeder
{
    public function run(): void
    {
        Kontak::create([
            'judul' => 'Mari Diskusikan Project Anda',
            'sub_judul' => null,
            'deskripsi' => 'Kami siap membantu bisnis Anda tumbuh lebih besar dengan solusi periklanan luar ruang yang efektif.',
            
            'icon_alamat' => 'bi-geo-alt-fill',
            'judul_alamat' => 'Alamat Kantor',
            'deskripsi_alamat' => "Jl. Pulau Saelus No. 50X / 61\nDenpasar, Bali",
            
            'icon_telepon' => 'bi-telephone-fill',
            'judul_telepon' => 'Telepon & Fax',
            'deskripsi_telepon' => "Phone: (0361) 232355\nFax: (0361) 221874",
            
            'icon_email' => 'bi-envelope-fill',
            'judul_email' => 'Email',
            'deskripsi_email' => 'tribhakti77@yahoo.com',
            
            'icon_direktur' => 'bi-person-badge-fill',
            'judul_direktur' => 'Direktur',
            'deskripsi_direktur' => "I Made Sukadana, SE\n+62 81 139 6778\n+62 81 558 217 777\n+62 361 853 8778",
        ]);
    }
}
