<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $table = 'kontak';

    protected $fillable = [
        'wilayah_id',
        'jabatan_id',
        'nama',
        'no_hp',
        'foto',
    ];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
