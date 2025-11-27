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
        Schema::create('rs_detail_trx', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaksi');
            $table->string('nama_tindakan');
            $table->string('harga');
            $table->decimal('qty');
            $table->decimal('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rs_detail_trx');
    }
};
