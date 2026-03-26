<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sirine_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sirine_id')->constrained('sirines')->cascadeOnDelete();
            $table->unsignedTinyInteger('old_level')->nullable();
            $table->unsignedTinyInteger('new_level')->nullable();
            $table->enum('old_status', ['normal', 'siaga', 'darurat', 'offline'])->nullable();
            $table->enum('new_status', ['normal', 'siaga', 'darurat', 'offline'])->nullable();
            $table->string('action')->default('update_level');
            $table->string('changed_by')->nullable();
            $table->text('reason')->nullable();
            $table->string('source_ip', 45)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sirine_logs');
    }
};

