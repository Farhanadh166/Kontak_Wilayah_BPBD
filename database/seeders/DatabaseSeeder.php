<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Agar truncate tabel dengan foreign key (MySQL) tidak error
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call([
            WilayahSeeder::class,
            JabatanSeeder::class,
            KontakSeeder::class,
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Optional: kalau kamu butuh user untuk login admin nanti
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
