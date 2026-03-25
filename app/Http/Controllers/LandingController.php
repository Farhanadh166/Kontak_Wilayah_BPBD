<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\Wilayah;
use App\Models\Jabatan;

class LandingController extends Controller
{
    public function index()
    {
        // Ambil semua data untuk filter
        $wilayahList = Wilayah::orderBy('nama_wilayah')->get();
        $jabatanList = Jabatan::orderBy('nama_jabatan')->get();

        // Ambil kontak lengkap dengan relasi untuk ditampilkan
        // Diurutkan berdasarkan nama wilayah, lalu jabatan, lalu nama kontak
        $kontak = Kontak::with(['wilayah', 'jabatan'])
            ->join('wilayah', 'kontak.wilayah_id', '=', 'wilayah.id')
            ->join('jabatan', 'kontak.jabatan_id', '=', 'jabatan.id')
            ->orderBy('wilayah.nama_wilayah')
            ->orderBy('jabatan.nama_jabatan')
            ->orderBy('kontak.nama')
            ->select('kontak.*')
            ->get();

        return view('landing', compact(
            'wilayahList',
            'jabatanList',
            'kontak'
        ));
    }
}

