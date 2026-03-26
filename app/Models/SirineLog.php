<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SirineLog extends Model
{
    protected $table = 'sirine_logs';

    protected $fillable = [
        'sirine_id',
        'old_level',
        'new_level',
        'old_status',
        'new_status',
        'action',
        'changed_by',
        'reason',
        'source_ip',
    ];

    public function sirine()
    {
        return $this->belongsTo(Sirine::class);
    }
}

