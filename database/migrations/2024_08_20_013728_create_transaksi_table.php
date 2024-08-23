<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    public function up()
    {
        
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id(); // Alias dari unsignedBigInteger('id')
            $table->unsignedBigInteger('id_payment');
            $table->unsignedBigInteger('customer_id');
            $table->string('customer');
            $table->decimal('diskon', 5, 2)->default(0);
            $table->decimal('total_harga', 10, 2);
            $table->unsignedBigInteger('id_kasir');
            $table->timestamps();

            // Define foreign keys
            $table->foreign('id_payment')->references('id')->on('payment');
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->foreign('id_kasir')->references('id')->on('kasir');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
