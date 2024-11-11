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
            $table->string('merek_motor')->nullable();
            $table->integer('tahun_pembuatan')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('motor', function (Blueprint $table) {
            $table->dropColumn(['merek_motor', 'tahun_pembuatan']);
        });
    }
    
};
