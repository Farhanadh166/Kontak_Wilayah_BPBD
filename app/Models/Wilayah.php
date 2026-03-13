<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $table = 'wilayah';

    protected $fillable = [
        'nama_wilayah',
        'jenis_wilayah'
    ];

    public function kontak()
    {
        return $this->hasOne(KontakBpbd::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
