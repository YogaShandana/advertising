<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $fillable = [
        'judul',
        'sub_judul',
        'deskripsi',
        'icon_alamat',
        'judul_alamat',
        'deskripsi_alamat',
        'icon_telepon',
        'judul_telepon',
        'deskripsi_telepon',
        'icon_email',
        'judul_email',
        'deskripsi_email',
        'icon_direktur',
        'judul_direktur',
        'deskripsi_direktur',
    ];
}
