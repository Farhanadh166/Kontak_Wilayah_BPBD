<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    public function run(): void
    {
        $jabatans = [
            'Kalaksa',
            'Kabid KL',
            'Kasi Kedaruratan',
            'Kasi Logistik',
            'Operator Pusdalops',
            'Operator Database'
        ];

        // Hindari data dobel saat seeding berulang
        DB::table('jabatan')->truncate();

        foreach ($jabatans as $j) {
            DB::table('jabatan')->insert([
                'nama_jabatan' => $j,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}