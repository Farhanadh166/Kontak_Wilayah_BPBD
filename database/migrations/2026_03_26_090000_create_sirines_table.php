<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sirines', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sirine');
            $table->foreignId('wilayah_id')->nullable()->constrained('wilayah')->nullOnDelete();
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->enum('status', ['normal', 'siaga', 'darurat', 'offline'])->default('normal');
            $table->unsignedTinyInteger('level_suara')->default(1);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_simulation')->default(true);
            $table->timestamp('last_seen_at')->nullable();
            $table->timestamp('last_update')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sirines');
    }
};

