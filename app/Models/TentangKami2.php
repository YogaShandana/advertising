<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TentangKami2 extends Model
{
    protected $table = 'tentang_kami2s';
    
    protected $fillable = [
        'judul',
        'deskripsi',
        'icon1',
        'angka_icon1',
        'deskripsi_icon1',
        'icon2',
        'angka_icon2',
        'deskripsi_icon2',
        'icon3',
        'angka_icon3',
        'deskripsi_icon3',
    ];
}
