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
        Schema::create('items_transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_transaksi')->constrained();
            $table->foreignId('id_produk')->constrained();
            $table->decimal('harga', 10, 2);
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('id_transaksi')->references('id')->on('transaksi');
            $table->foreign('id_produk')->references('id')->on('product');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items_transaksi');
    }
};
