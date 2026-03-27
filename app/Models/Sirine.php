<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sirine extends Model
{
    protected $table = 'sirines';

    protected $fillable = [
        'nama_petugas',
        'lokasi',
        'latitude',
        'longitude',
        'status_aktif',
        'kondisi_alat',
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
    ];
}

