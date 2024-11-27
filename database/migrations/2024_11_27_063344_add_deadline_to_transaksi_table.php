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
        Schema::table('transaksi', function (Blueprint $table) {
            // Tambahkan nilai 'selesai' ke ENUM status
            $table->enum('status', ['pending', 'dikonfirmasi', 'dibatalkan', 'selesai'])
                ->default('pending')
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi', function (Blueprint $table) {
            // Kembalikan ke definisi ENUM sebelumnya
            $table->enum('status', ['pending', 'dikonfirmasi', 'dibatalkan'])
                ->default('pending')
                ->change();
        });
    }
    
};
