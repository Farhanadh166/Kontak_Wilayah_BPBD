<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WilayahSeeder extends Seeder
{
    public function run(): void
    {
        $wilayahs = [
            'Provinsi Sumatera Barat',
            'Kabupaten Agam',
            'Kabupaten Darmasraya',
            'Kabupaten Kep. Mentawai',
            'Kabupaten Lima Puluh Kota',
            'Kabupaten Padang Pariaman',
            'Kabupaten Pasaman',
            'Kabupaten Pasaman Barat',
            'Kabupaten Pesisir Selatan',
            'Kabupaten Sijunjung',
            'Kabupaten Solok',
            'Kabupaten Solok Selatan',
            'Kabupaten Tanah Datar',
            'Kota Bukittinggi',
            'Kota Padang',
            'Kota Padang Panjang',
            'Kota Pariaman',
            'Kota Payakumbuh',
            'Kota Sawahlunto',
            'Kota Solok'
        ];

        // Hindari data dobel saat seeding berulang
        DB::table('wilayah')->truncate();

        foreach ($wilayahs as $w) {
            DB::table('wilayah')->insert([
                'nama_wilayah' => $w,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}