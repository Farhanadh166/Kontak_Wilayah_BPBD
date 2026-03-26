<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kontak;

class Wilayah extends Model
{
    protected $table = 'wilayah';

    protected $fillable = [
        'nama_wilayah',
        'foto',
    ];
    
    public function kontak()
    {
        return $this->hasMany(Kontak::class);
    }
}

