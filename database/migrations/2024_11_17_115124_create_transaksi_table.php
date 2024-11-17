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
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('motor_id');
            $table->date('tanggal_sewa');
            $table->date('tanggal_kembali');
            $table->integer('jumlah');
            $table->decimal('total_harga', 15, 2);
            $table->enum('metode_pembayaran', ['bri', 'bni', 'bca', 'mandiri', 'dana']);
            $table->string('foto_bukti_pembayaran')->nullable();
            $table->enum('status', ['pending', 'dikonfirmasi', 'dibatalkan'])->default('pending');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('motor_id')->references('id')->on('motor')->onDelete('cascade');
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
