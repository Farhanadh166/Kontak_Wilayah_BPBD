<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('sirines')) {
            Schema::table('sirines', function (Blueprint $table) {
                if (Schema::hasColumn('sirines', 'wilayah_id')) {
                    // Abaikan jika constraint tidak ada/berbeda nama
                    try {
                        $table->dropForeign(['wilayah_id']);
                    } catch (\Throwable $e) {
                    }
                }

                $legacyColumns = [
                    'nama_sirine',
                    'wilayah_id',
                    'status',
                    'level_suara',
                    'is_active',
                    'is_simulation',
                    'last_seen_at',
                    'last_update',
                ];

                foreach ($legacyColumns as $column) {
                    if (Schema::hasColumn('sirines', $column)) {
                        $table->dropColumn($column);
                    }
                }
            });
        }

        if (Schema::hasTable('sirine_logs')) {
            Schema::drop('sirine_logs');
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('sirines')) {
            Schema::table('sirines', function (Blueprint $table) {
                if (!Schema::hasColumn('sirines', 'nama_sirine')) {
                    $table->string('nama_sirine')->nullable();
                }
                if (!Schema::hasColumn('sirines', 'wilayah_id')) {
                    $table->unsignedBigInteger('wilayah_id')->nullable();
                }
                if (!Schema::hasColumn('sirines', 'status')) {
                    $table->enum('status', ['normal', 'siaga', 'darurat', 'offline'])->default('normal');
                }
                if (!Schema::hasColumn('sirines', 'level_suara')) {
                    $table->unsignedTinyInteger('level_suara')->default(1);
                }
                if (!Schema::hasColumn('sirines', 'is_active')) {
                    $table->boolean('is_active')->default(true);
                }
                if (!Schema::hasColumn('sirines', 'is_simulation')) {
                    $table->boolean('is_simulation')->default(true);
                }
                if (!Schema::hasColumn('sirines', 'last_seen_at')) {
                    $table->timestamp('last_seen_at')->nullable();
                }
                if (!Schema::hasColumn('sirines', 'last_update')) {
                    $table->timestamp('last_update')->nullable();
                }
            });
        }

        if (!Schema::hasTable('sirine_logs')) {
            Schema::create('sirine_logs', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('sirine_id');
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
    }
};

