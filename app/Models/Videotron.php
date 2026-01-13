<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videotron extends Model
{
    protected $guarded = [];

    protected $casts = [
        'bookings' => 'array',
        'images' => 'array',
    ];
}
