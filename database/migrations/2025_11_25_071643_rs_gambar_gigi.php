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
        Schema::create('rs_gambar_gigi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_gambar');
            $table->string('code_loc');//exmp: UNE,PRE,FIS
            $table->string('pos_loc_general');//exmp: 81,87
            $table->string('pos_loc'); //exmp :81-L
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rs_gambar_gigi');
    }
};
