<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kontak_bpbd', function (Blueprint $table) {
            $table->id();

            $table->foreignId('wilayah_id')->constrained('wilayah')->cascadeOnDelete();

            $table->string('nama_kalaksa')->nullable();
            $table->string('no_kalaksa')->nullable();

            $table->string('nama_kabid_kl')->nullable();
            $table->string('no_kabid_kl')->nullable();

            $table->string('nama_kasi_kedaruratan')->nullable();
            $table->string('no_kasi_kedaruratan')->nullable();

            $table->string('nama_kasi_logistik')->nullable();
            $table->string('no_kasi_logistik')->nullable();

            $table->string('nama_operator_pusdalops')->nullable();
            $table->string('no_operator_pusdalops')->nullable();

            $table->string('nama_operator_database')->nullable();
            $table->string('no_operator_database')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontak_bpbd');
    }
};
