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
        Schema::create('motor', function (Blueprint $table) {
            $table->id();
            $table->string('nama_motor');
            $table->foreignId('merek_id')->constrained('merek')->onDelete('cascade');
            $table->string('nomor_polisi')->unique();
            $table->string('foto_motor')->nullable();
            $table->decimal('harga_sewa', 10, 2);
            $table->enum('transmisi',['manual','matic']);
            $table->enum('status',['tersedia','sedang disewa'])->default('tersedia');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motor');
    }
};
