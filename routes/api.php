<?php

use App\Http\Controllers\api_controller;
use App\Http\Controllers\masterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('pasien',[api_controller::class,'api_get_pasien']);
Route::get('pasien/{id}',[api_controller::class,'api_get_pasien_id']);
Route::post('pasien',[api_controller::class,'api_simpan_pasien']);
Route::middleware('bearer')->group(function () {
    Route::post('login-pasien',[api_controller::class,'loginPasien']);
    Route::post('daftar-pasien',[api_controller::class,'daftarPasien']);
    Route::get('list-dokter',[api_controller::class,'listDokter']);
    Route::get('list-poli',[api_controller::class,'listPoli']);
    Route::get('list-penjamin',[api_controller::class,'listPenjamin']);
    Route::get('jadwal-dokter/{id}',[api_controller::class,'jadwalDokter']);
    Route::get('list-antrian/{norm}',[api_controller::class,'listAntrian']);
    Route::get('riwayat-kunjungan/{id}',[api_controller::class,'riwayatKunjungan']);
    Route::get('riwayat-detail-kunjungan/{id}',[api_controller::class,'riwayatDetailKunjungan']);
    Route::post('ambil-antrian',[api_controller::class,'ambilAntrian']);
    Route::get('/profile', function () {
        return response()->json(['message' => 'Akses berhasil']);
    });
});