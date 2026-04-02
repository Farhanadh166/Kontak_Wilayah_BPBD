<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('wilayah_jabatan_layout')) {
            Schema::drop('wilayah_jabatan_layout');
        }
    }

    public function down(): void
    {
        // No-op: table was auxiliary for layout only.
    }
};

