<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('motor', function (Blueprint $table) {

    
            // Menghapus kolom merek_id
            $table->dropColumn('merek_id');
        });
    }
    
    public function down()
    {
        Schema::table('motor', function (Blueprint $table) {
            // Mengembalikan kolom merek_id dan foreign key constraint jika migrasi di rollback
            $table->unsignedBigInteger('merek_id');
            $table->foreign('merek_id')->references('id')->on('merek');
        });
    }
    
};
