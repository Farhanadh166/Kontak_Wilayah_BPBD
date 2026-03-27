<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sirines', function (Blueprint $table) {
            if (!Schema::hasColumn('sirines', 'nama_petugas')) {
                $table->string('nama_petugas')->nullable()->after('id');
            }
            if (!Schema::hasColumn('sirines', 'lokasi')) {
                $table->string('lokasi')->nullable()->after('nama_petugas');
            }
            if (!Schema::hasColumn('sirines', 'status_aktif')) {
                $table->enum('status_aktif', ['aktif', 'nonaktif'])->default('aktif')->after('longitude');
            }
            if (!Schema::hasColumn('sirines', 'kondisi_alat')) {
                $table->text('kondisi_alat')->nullable()->after('status_aktif');
            }
        });
    }

    public function down(): void
    {
        Schema::table('sirines', function (Blueprint $table) {
            if (Schema::hasColumn('sirines', 'kondisi_alat')) {
                $table->dropColumn('kondisi_alat');
            }
            if (Schema::hasColumn('sirines', 'status_aktif')) {
                $table->dropColumn('status_aktif');
            }
            if (Schema::hasColumn('sirines', 'lokasi')) {
                $table->dropColumn('lokasi');
            }
            if (Schema::hasColumn('sirines', 'nama_petugas')) {
                $table->dropColumn('nama_petugas');
            }
        });
    }
};

