<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\Wilayah;
use App\Models\Jabatan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKontak = Kontak::count();
        $totalWilayah = Wilayah::count();
        $totalJabatan = Jabatan::count();

        return view('dashboard', compact(
            'totalKontak',
            'totalWilayah',
            'totalJabatan'
        ));
    }
}
