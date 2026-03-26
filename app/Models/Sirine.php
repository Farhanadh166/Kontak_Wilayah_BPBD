<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sirine extends Model
{
    protected $table = 'sirines';

    protected $fillable = [
        'nama_sirine',
        'wilayah_id',
        'latitude',
        'longitude',
        'status',
        'level_suara',
        'is_active',
        'is_simulation',
        'last_seen_at',
        'last_update',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_simulation' => 'boolean',
        'last_seen_at' => 'datetime',
        'last_update' => 'datetime',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }

    public function logs()
    {
        return $this->hasMany(SirineLog::class);
    }
}

