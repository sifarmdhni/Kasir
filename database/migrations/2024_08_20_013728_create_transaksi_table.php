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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_payment')->constrained();
            $table->foreignId('customer_id')->constrained();
            $table->string('customer');
            $table->decimal('diskon', 5, 2)->nullable();
            $table->decimal('total_harga', 10, 2);
            $table->foreignId('id_kasir')->constrained();
            $table->timestamps();
        
            $table->foreign('id_payment')->references('id')->on('payment');
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->foreign('id_kasir')->references('id')->on('kasir');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
