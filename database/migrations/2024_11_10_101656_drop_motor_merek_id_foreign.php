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
        $table->dropForeign(['merek_id']);
    });
}

public function down()
{
    Schema::table('motor', function (Blueprint $table) {
        $table->foreign('merek_id')->references('id')->on('merek');
    });
}

};
