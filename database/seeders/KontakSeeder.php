<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KontakSeeder extends Seeder
{
    public function run(): void
    {
        $wilayah = fn ($n) => DB::table('wilayah')->where('nama_wilayah', $n)->value('id');
        $jabatan = fn ($n) => DB::table('jabatan')->where('nama_jabatan', $n)->value('id');

        $data = [

        /*
        ================= PROVINSI =================
        */
        ['wilayah_id'=>$wilayah('Provinsi Sumatera Barat'),'jabatan_id'=>$jabatan('Kalaksa'),'nama'=>'Erasukma Munaf','no_hp'=>'082283387772'],
        ['wilayah_id'=>$wilayah('Provinsi Sumatera Barat'),'jabatan_id'=>$jabatan('Kabid KL'),'nama'=>'Fajar Sukma','no_hp'=>'081270522400'],

        /*
        ================= AGAM =================
        */
        ['wilayah_id'=>$wilayah('Kabupaten Agam'),'jabatan_id'=>$jabatan('Kalaksa'),'nama'=>'Rahmad Lasmono','no_hp'=>'08126637241'],
        ['wilayah_id'=>$wilayah('Kabupaten Agam'),'jabatan_id'=>$jabatan('Kabid KL'),'nama'=>'Abdul Ghafur','no_hp'=>'085296660628'],

        ['wilayah_id'=>$wilayah('Kabupaten Agam'),'jabatan_id'=>$jabatan('Operator Pusdalops'),'nama'=>'Hengki Murdiono','no_hp'=>'081374963615'],
        ['wilayah_id'=>$wilayah('Kabupaten Agam'),'jabatan_id'=>$jabatan('Operator Pusdalops'),'nama'=>'Lukman Syahputra','no_hp'=>'082170948247'],
        ['wilayah_id'=>$wilayah('Kabupaten Agam'),'jabatan_id'=>$jabatan('Operator Pusdalops'),'nama'=>'Supardi','no_hp'=>'082285445644'],
        ['wilayah_id'=>$wilayah('Kabupaten Agam'),'jabatan_id'=>$jabatan('Operator Pusdalops'),'nama'=>'Genta Putra Ramadhani','no_hp'=>'082174843071'],
        ['wilayah_id'=>$wilayah('Kabupaten Agam'),'jabatan_id'=>$jabatan('Operator Pusdalops'),'nama'=>'Rika Novia Darmawati','no_hp'=>'082171392470'],
        ['wilayah_id'=>$wilayah('Kabupaten Agam'),'jabatan_id'=>$jabatan('Operator Pusdalops'),'nama'=>'Sri Mahyuni','no_hp'=>'085363651055'],

        /*
        ================= DARMASRAYA =================
        */
        ['wilayah_id'=>$wilayah('Kabupaten Darmasraya'),'jabatan_id'=>$jabatan('Kalaksa'),'nama'=>'Suherman Juanaidi','no_hp'=>'081363495294'],
        ['wilayah_id'=>$wilayah('Kabupaten Darmasraya'),'jabatan_id'=>$jabatan('Kabid KL'),'nama'=>'Ardianus','no_hp'=>'081277058276'],
        ['wilayah_id'=>$wilayah('Kabupaten Darmasraya'),'jabatan_id'=>$jabatan('Operator Database'),'nama'=>'Yana Witarsa','no_hp'=>'082285072323'],

        /*
        ================= MENTAWAI =================
        */
        ['wilayah_id'=>$wilayah('Kabupaten Kep. Mentawai'),'jabatan_id'=>$jabatan('Kalaksa'),'nama'=>'Sarman Simanungkalit','no_hp'=>'081365985281'],
        ['wilayah_id'=>$wilayah('Kabupaten Kep. Mentawai'),'jabatan_id'=>$jabatan('Kabid KL'),'nama'=>'Abital','no_hp'=>'082269417779'],
        ['wilayah_id'=>$wilayah('Kabupaten Kep. Mentawai'),'jabatan_id'=>$jabatan('Kasi Kedaruratan'),'nama'=>'Albert','no_hp'=>'082144383332'],
        ['wilayah_id'=>$wilayah('Kabupaten Kep. Mentawai'),'jabatan_id'=>$jabatan('Kasi Logistik'),'nama'=>'Halimah','no_hp'=>'081374567279'],

        ['wilayah_id'=>$wilayah('Kabupaten Kep. Mentawai'),'jabatan_id'=>$jabatan('Operator Database'),'nama'=>'Tri Oktavia','no_hp'=>'082390692919'],
        ['wilayah_id'=>$wilayah('Kabupaten Kep. Mentawai'),'jabatan_id'=>$jabatan('Operator Database'),'nama'=>'Azfariza Huska','no_hp'=>'085274480148'],

        /*
        ================= LIMA PULUH KOTA =================
        */
        ['wilayah_id'=>$wilayah('Kabupaten Lima Puluh Kota'),'jabatan_id'=>$jabatan('Kalaksa'),'nama'=>'Zaimar Hakim','no_hp'=>'085271804517'],
        ['wilayah_id'=>$wilayah('Kabupaten Lima Puluh Kota'),'jabatan_id'=>$jabatan('Kabid KL'),'nama'=>'Ardiman','no_hp'=>'085274696211'],

        ['wilayah_id'=>$wilayah('Kabupaten Lima Puluh Kota'),'jabatan_id'=>$jabatan('Operator Pusdalops'),'nama'=>'Miko Darlis','no_hp'=>'081270736006'],
        ['wilayah_id'=>$wilayah('Kabupaten Lima Puluh Kota'),'jabatan_id'=>$jabatan('Operator Pusdalops'),'nama'=>'Rudi Idra','no_hp'=>'08126683610'],
        ['wilayah_id'=>$wilayah('Kabupaten Lima Puluh Kota'),'jabatan_id'=>$jabatan('Operator Pusdalops'),'nama'=>'Alek Sandra','no_hp'=>'081374582864'],

        /*
        ================= PADANG PARIAMAN =================
        */
        ['wilayah_id'=>$wilayah('Kabupaten Padang Pariaman'),'jabatan_id'=>$jabatan('Kalaksa'),'nama'=>'Emri Nurman','no_hp'=>'085263296162'],
        ['wilayah_id'=>$wilayah('Kabupaten Padang Pariaman'),'jabatan_id'=>$jabatan('Kabid KL'),'nama'=>'Jonadi','no_hp'=>'082386692757'],
        ['wilayah_id'=>$wilayah('Kabupaten Padang Pariaman'),'jabatan_id'=>$jabatan('Kasi Kedaruratan'),'nama'=>'Romer Merkurius','no_hp'=>'082173052129'],
        ['wilayah_id'=>$wilayah('Kabupaten Padang Pariaman'),'jabatan_id'=>$jabatan('Kasi Logistik'),'nama'=>'Mukhsis Muslim','no_hp'=>'081363741800'],

        ['wilayah_id'=>$wilayah('Kabupaten Padang Pariaman'),'jabatan_id'=>$jabatan('Operator Pusdalops'),'nama'=>'Andre Putra','no_hp'=>'082383010492'],
        ['wilayah_id'=>$wilayah('Kabupaten Padang Pariaman'),'jabatan_id'=>$jabatan('Operator Pusdalops'),'nama'=>'Afif Alfarisi','no_hp'=>'085272578508'],

        /*
        ================= PASAMAN =================
        */
        ['wilayah_id'=>$wilayah('Kabupaten Pasaman'),'jabatan_id'=>$jabatan('Kalaksa'),'nama'=>'Mardianto','no_hp'=>'085274285046'],
        ['wilayah_id'=>$wilayah('Kabupaten Pasaman'),'jabatan_id'=>$jabatan('Kabid KL'),'nama'=>'Haryanto','no_hp'=>'082383552777'],

        ['wilayah_id'=>$wilayah('Kabupaten Pasaman'),'jabatan_id'=>$jabatan('Operator Pusdalops'),'nama'=>'BISCO','no_hp'=>'083190988488'],
        ['wilayah_id'=>$wilayah('Kabupaten Pasaman'),'jabatan_id'=>$jabatan('Operator Pusdalops'),'nama'=>'Rudy Jens','no_hp'=>'082348303967'],

        /*
        ================= PASAMAN BARAT =================
        */
        ['wilayah_id'=>$wilayah('Kabupaten Pasaman Barat'),'jabatan_id'=>$jabatan('Kalaksa'),'nama'=>'Jhon Edwar','no_hp'=>'085182484131'],
        ['wilayah_id'=>$wilayah('Kabupaten Pasaman Barat'),'jabatan_id'=>$jabatan('Kabid KL'),'nama'=>'Afrizal','no_hp'=>'085364645131'],

        /*
        ================= PESISIR SELATAN =================
        */
        ['wilayah_id'=>$wilayah('Kabupaten Pesisir Selatan'),'jabatan_id'=>$jabatan('Kalaksa'),'nama'=>'Armen','no_hp'=>'081363490172'],
        ['wilayah_id'=>$wilayah('Kabupaten Pesisir Selatan'),'jabatan_id'=>$jabatan('Kabid KL'),'nama'=>'Hendri Agustian','no_hp'=>'081363380713'],
        ['wilayah_id'=>$wilayah('Kabupaten Pesisir Selatan'),'jabatan_id'=>$jabatan('Operator Database'),'nama'=>'Anggye Kurniawan','no_hp'=>'081275113131'],

        /*
        ================= SIJUNJUNG =================
        */
        ['wilayah_id'=>$wilayah('Kabupaten Sijunjung'),'jabatan_id'=>$jabatan('Kalaksa'),'nama'=>'Yulizar','no_hp'=>'081363461496'],
        ['wilayah_id'=>$wilayah('Kabupaten Sijunjung'),'jabatan_id'=>$jabatan('Kabid KL'),'nama'=>'Feby Hendra','no_hp'=>'08126760356'],

        /*
        ================= SOLOK =================
        */
        ['wilayah_id'=>$wilayah('Kabupaten Solok'),'jabatan_id'=>$jabatan('Kalaksa'),'nama'=>'Khairul','no_hp'=>'082284490156'],
        ['wilayah_id'=>$wilayah('Kabupaten Solok'),'jabatan_id'=>$jabatan('Kabid KL'),'nama'=>'Indra Muchsis','no_hp'=>'082387275695'],

        /*
        ================= SOLOK SELATAN =================
        */
        ['wilayah_id'=>$wilayah('Kabupaten Solok Selatan'),'jabatan_id'=>$jabatan('Kalaksa'),'nama'=>'Novi Hendrix','no_hp'=>'081267020645'],
        ['wilayah_id'=>$wilayah('Kabupaten Solok Selatan'),'jabatan_id'=>$jabatan('Kabid KL'),'nama'=>'Romi Aprijal','no_hp'=>'081374512122'],

        /*
        ================= TANAH DATAR =================
        */
        ['wilayah_id'=>$wilayah('Kabupaten Tanah Datar'),'jabatan_id'=>$jabatan('Kalaksa'),'nama'=>'Remon Revlin','no_hp'=>'085263108980'],
        ['wilayah_id'=>$wilayah('Kabupaten Tanah Datar'),'jabatan_id'=>$jabatan('Kabid KL'),'nama'=>'Dody Susilo','no_hp'=>'081374988808'],

        /*
        ================= BUKITTINGGI =================
        */
        ['wilayah_id'=>$wilayah('Kota Bukittinggi'),'jabatan_id'=>$jabatan('Kalaksa'),'nama'=>'Zulhenri','no_hp'=>'082288341747'],
        ['wilayah_id'=>$wilayah('Kota Bukittinggi'),'jabatan_id'=>$jabatan('Kabid KL'),'nama'=>'Doni','no_hp'=>'081363754999'],

        /*
        ================= PADANG =================
        */
        ['wilayah_id'=>$wilayah('Kota Padang'),'jabatan_id'=>$jabatan('Kalaksa'),'nama'=>'Hendri Zulviton','no_hp'=>'082384117670'],
        ['wilayah_id'=>$wilayah('Kota Padang'),'jabatan_id'=>$jabatan('Kabid KL'),'nama'=>'Al Banna','no_hp'=>'081266943300'],
        ['wilayah_id'=>$wilayah('Kota Padang'),'jabatan_id'=>$jabatan('Operator Database'),'nama'=>'Febrian Mulyadi','no_hp'=>'089623104492'],

        /*
        ================= PADANG PANJANG =================
        */
        ['wilayah_id'=>$wilayah('Kota Padang Panjang'),'jabatan_id'=>$jabatan('Kalaksa'),'nama'=>'Dian Eka Putra','no_hp'=>'085272101313'],
        ['wilayah_id'=>$wilayah('Kota Padang Panjang'),'jabatan_id'=>$jabatan('Kabid KL'),'nama'=>'Kharul Abdi','no_hp'=>'085278352717'],

        /*
        ================= PARIAMAN =================
        */
        ['wilayah_id'=>$wilayah('Kota Pariaman'),'jabatan_id'=>$jabatan('Kalaksa'),'nama'=>'Ferry Ferdian','no_hp'=>'085274311199'],
        ['wilayah_id'=>$wilayah('Kota Pariaman'),'jabatan_id'=>$jabatan('Kabid KL'),'nama'=>'Dendy Pribadi','no_hp'=>'085274273463'],

        /*
        ================= PAYAKUMBUH =================
        */
        ['wilayah_id'=>$wilayah('Kota Payakumbuh'),'jabatan_id'=>$jabatan('Kalaksa'),'nama'=>'Erizon','no_hp'=>'082297304995'],
        ['wilayah_id'=>$wilayah('Kota Payakumbuh'),'jabatan_id'=>$jabatan('Kabid KL'),'nama'=>'Hapi','no_hp'=>'081277252288'],

        /*
        ================= SAWAHLUNTO =================
        */
        ['wilayah_id'=>$wilayah('Kota Sawahlunto'),'jabatan_id'=>$jabatan('Kalaksa'),'nama'=>'Hilmed','no_hp'=>'081266873752'],
        ['wilayah_id'=>$wilayah('Kota Sawahlunto'),'jabatan_id'=>$jabatan('Kabid KL'),'nama'=>'Dedi Satria','no_hp'=>'085198057763'],

        /*
        ================= KOTA SOLOK =================
        */
        ['wilayah_id'=>$wilayah('Kota Solok'),'jabatan_id'=>$jabatan('Kalaksa'),'nama'=>'Edrizal','no_hp'=>'08126771299'],
        ['wilayah_id'=>$wilayah('Kota Solok'),'jabatan_id'=>$jabatan('Kasi Kedaruratan'),'nama'=>'Ade Chandra Yuda','no_hp'=>'08126643509'],

        ];

        // Hindari data dobel saat seeding berulang
        DB::table('kontak')->truncate();

        foreach ($data as $d) {
            DB::table('kontak')->insert([
                'wilayah_id'=>$d['wilayah_id'],
                'jabatan_id'=>$d['jabatan_id'],
                'nama'=>$d['nama'],
                'no_hp'=>$d['no_hp'],
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}