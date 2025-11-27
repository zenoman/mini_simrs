<?php

use App\Http\Controllers\asesmenController;
use App\Http\Controllers\kunjungan_controller;
use App\Http\Controllers\masterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('pasien')->group(function () {
    Route::get('index-pasien',[masterController::class,'indexPasien']);
    Route::post('simpan-pasien',[masterController::class,'addPasien']);
    Route::get('edit-pasien/{id}',[masterController::class,'editPasien']);
    Route::post('update-pasien/{id}',[masterController::class,'updatePasien']);
    Route::get('delete-pasien/{id}',[masterController::class,'deletePasien']);
    Route::get('detail-pasien/{id}',[masterController::class,'detailPasien']);
});

Route::prefix('billing')->group(function () {
    Route::get('index-billing',[masterController::class,'indexBilling']);
    Route::get('pembayaran/{id}',[masterController::class,'pembayaranBilling']);
    Route::post('simpan-billing',[masterController::class,'addPembayaran']);
    Route::get('detail-billing/{id}',[masterController::class,'detailBilling']);
    Route::get('hapus-billing/{id}',[masterController::class,'hapusBilling']);
});
Route::prefix('kunjungan')->group(function () {
    Route::get('index-kunjungan',[kunjungan_controller::class,'indexKunjungan']);    
    Route::post('simpan-kunjungan',[kunjungan_controller::class,'addKunjungan']);
    Route::get('edit-kunjungan/{id}',[kunjungan_controller::class,'editKunjungan']);
    Route::post('update-kunjungan',[kunjungan_controller::class,'updateKunjungan']);
    Route::get('delete-kunjungan/{id}',[kunjungan_controller::class,'deleteKunjungan']);
    Route::get('detail-kunjungan/{id}',[kunjungan_controller::class,'detailKunjungan']);
    Route::get('asesmen-gigi/{id}',[kunjungan_controller::class,'asesmenGigi']);
});
Route::prefix('asesmen')->group(function(){
    Route::get('/',[asesmenController::class,'indexAsesmen']);
    Route::get('detail-asesmen/{noregist}',[asesmenController::class,'detailAsesmen']);
    Route::get('get-asesmen/{noregist}',[asesmenController::class,'getAsesmen']);
    Route::post('simpan-asesmen',[asesmenController::class,'simpanAsesmen']);
    Route::get('print-asesmen/{noregist}',[asesmenController::class,'printAsesmen']);
    Route::get('hapus-detail-asesmen/{id}',[asesmenController::class,'hapusDetailAsesmen']);
});
Route::get('cari-pasien',[masterController::class,'cariPasien']);