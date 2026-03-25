<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('wilayah', function (Blueprint $table) {
            if (!Schema::hasColumn('wilayah', 'foto')) {
                $table->string('foto')->nullable()->after('nama_wilayah');
            }
        });

        Schema::table('kontak', function (Blueprint $table) {
            if (!Schema::hasColumn('kontak', 'foto')) {
                $table->string('foto')->nullable()->after('no_hp');
            }
        });
    }

    public function down(): void
    {
        Schema::table('wilayah', function (Blueprint $table) {
            if (Schema::hasColumn('wilayah', 'foto')) {
                $table->dropColumn('foto');
            }
        });

        Schema::table('kontak', function (Blueprint $table) {
            if (Schema::hasColumn('kontak', 'foto')) {
                $table->dropColumn('foto');
            }
        });
    }
};

