<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rs_kunjungan', function (Blueprint $table) {
            $table->id();
            $table->string('no_registrasi');
            $table->string('no_urut');
            $table->string('no_rm');
            $table->date('tanggal_kunjungan');
            $table->string('kode_dokter');
            $table->string('id_poli');
            $table->string('instalasi');
            $table->string('penjamin_id');
            $table->string('validasi_antrian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rs_kunjungan');
    }
};
