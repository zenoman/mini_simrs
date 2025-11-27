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
        Schema::create('rs_asesmen_medis', function (Blueprint $table) {
            $table->id();
            $table->string('no_register');
            $table->string('kode_gambar_gigi');
            $table->string('oclusi');
            $table->string('torus_palatinus');
            $table->string('torus_mandibularis');
            $table->string('palatum');
            $table->string('diastema');
            $table->string('ket_lain');
            $table->string('d_m_f');
            $table->string('jum_foto');
            $table->string('jum_foto_rontgen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rs_asesmen_medis');
    }
};
