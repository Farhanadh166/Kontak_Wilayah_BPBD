<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LandingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\SirineController;

// Asset sederhana untuk landing (logo BPBD disimpan di resources/views/assets)
Route::get('/assets/bpbd.png', function () {
    return response()->file(
        resource_path('views/assets/bpbd.png'),
        ['Content-Type' => 'image/png']
    );
});

// Beranda navigasi publik
Route::get('/', [HomeController::class, 'index']);

// Halaman direktori kontak wilayah
Route::get('/kontak-wilayah', [LandingController::class, 'index']);

// Sistem monitoring & kontrol sirine
Route::get('/sirine', [SirineController::class, 'index']);
Route::get('/dashboard/sirine', [SirineController::class, 'adminIndex']);
Route::get('/dashboard/sirine/create', [SirineController::class, 'create']);
Route::post('/dashboard/sirine/store', [SirineController::class, 'store']);
Route::get('/dashboard/sirine/edit/{id}', [SirineController::class, 'edit']);
Route::post('/dashboard/sirine/update/{id}', [SirineController::class, 'update']);
Route::post('/dashboard/sirine/delete/{id}', [SirineController::class, 'destroy']);
Route::get('/dashboard/sirine/export/excel', [SirineController::class, 'exportExcel']);
Route::get('/dashboard/sirine/export/pdf', [SirineController::class, 'exportPdf']);

// Dashboard admin (AdminLTE)
Route::get('/dashboard', [DashboardController::class, 'index']);

// CRUD Kontak
Route::get('/kontak', [KontakController::class, 'index']);
Route::get('/kontak/create', [KontakController::class, 'create']);
Route::post('/kontak/store', [KontakController::class, 'store']);

Route::get('/kontak/edit/{id}', [KontakController::class, 'edit']);
Route::post('/kontak/update/{id}', [KontakController::class, 'update']);

Route::post('/kontak/delete/{id}', [KontakController::class, 'destroy']);

// CRUD Wilayah
Route::get('/wilayah', [WilayahController::class, 'index']);
Route::get('/wilayah/create', [WilayahController::class, 'create']);
Route::post('/wilayah/store', [WilayahController::class, 'store']);

Route::get('/wilayah/edit/{id}', [WilayahController::class, 'edit']);
Route::post('/wilayah/update/{id}', [WilayahController::class, 'update']);

Route::post('/wilayah/delete/{id}', [WilayahController::class, 'destroy']);

// CRUD Jabatan
Route::get('/jabatan', [JabatanController::class, 'index']);
Route::get('/jabatan/create', [JabatanController::class, 'create']);
Route::post('/jabatan/store', [JabatanController::class, 'store']);

Route::get('/jabatan/edit/{id}', [JabatanController::class, 'edit']);
Route::post('/jabatan/update/{id}', [JabatanController::class, 'update']);

Route::post('/jabatan/delete/{id}', [JabatanController::class, 'destroy']);
