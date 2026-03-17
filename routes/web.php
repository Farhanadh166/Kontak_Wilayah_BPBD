<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\KontakController;

Route::get('/kontak', [KontakController::class, 'index']);
Route::get('/kontak/create', [KontakController::class, 'create']);
Route::post('/kontak/store', [KontakController::class, 'store']);

Route::get('/kontak/edit/{id}', [KontakController::class, 'edit']);
Route::post('/kontak/update/{id}', [KontakController::class, 'update']);

Route::post('/kontak/delete/{id}', [KontakController::class, 'destroy']);


use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index']);

use App\Http\Controllers\WilayahController;

Route::get('/wilayah', [WilayahController::class, 'index']);
Route::get('/wilayah/create', [WilayahController::class, 'create']);
Route::post('/wilayah/store', [WilayahController::class, 'store']);

Route::get('/wilayah/edit/{id}', [WilayahController::class, 'edit']);
Route::post('/wilayah/update/{id}', [WilayahController::class, 'update']);

Route::post('/wilayah/delete/{id}', [WilayahController::class, 'destroy']);

use App\Http\Controllers\JabatanController;

Route::get('/jabatan', [JabatanController::class, 'index']);
Route::get('/jabatan/create', [JabatanController::class, 'create']);
Route::post('/jabatan/store', [JabatanController::class, 'store']);

Route::get('/jabatan/edit/{id}', [JabatanController::class, 'edit']);
Route::post('/jabatan/update/{id}', [JabatanController::class, 'update']);

Route::post('/jabatan/delete/{id}', [JabatanController::class, 'destroy']);
