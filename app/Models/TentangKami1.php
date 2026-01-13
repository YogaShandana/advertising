<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TentangKami1 extends Model
{
    protected $table = 'tentang_kami1s';
    
    protected $fillable = [
        'gambar',
        'judul',
        'sub_judul',
        'deskripsi',
        'icon1',
        'judul_icon1',
        'deskripsi_icon1',
        'icon2',
        'judul_icon2',
        'deskripsi_icon2',
    ];
}
