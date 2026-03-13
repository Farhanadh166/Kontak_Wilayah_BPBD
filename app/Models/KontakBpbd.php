<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KontakBpbd extends Model
{
    protected $table = 'kontak_bpbd';

    protected $fillable = [
        'wilayah_id',
        'nama_kalaksa',
        'no_kalaksa',
        'nama_kabid_kl',
        'no_kabid_kl',
        'nama_kasi_kedaruratan',
        'no_kasi_kedaruratan',
        'nama_kasi_logistik',
        'no_kasi_logistik',
        'nama_operator_pusdalops',
        'no_operator_pusdalops',
        'nama_operator_database',
        'no_operator_database'
    ];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }
}
