<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToMotorTable extends Migration
{
    public function up(): void
    {
        Schema::table('motor', function (Blueprint $table) {
            $table->timestamps(); // Ini akan menambahkan kolom created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::table('motor', function (Blueprint $table) {
            $table->dropTimestamps(); // Ini akan menghapus kolom created_at dan updated_at
        });
    }
}

