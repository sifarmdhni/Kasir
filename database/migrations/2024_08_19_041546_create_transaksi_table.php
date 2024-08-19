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
          $table->string('id_payment')->unique();
          $table->unsignedBigInteger('customer_id');
          $table->string('customer');
          $table->decimal('diskon', 5, 2)->default(0);
          $table->decimal('total_harga', 10, 2);
          $table->unsignedBigInteger('id_kasir');
          $table->timestamps();

          //foreign key constraints
          $table->foreign('customer_id')->references('id')->on('customers');
          $table->foreign('id_kasir')->references('id')->on('users');

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
