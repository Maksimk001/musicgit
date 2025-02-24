<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('music', function (Blueprint $table) {
            $table->integer('duration')->default(0); // Длина трека в секундах
        });
    }

    public function down()
    {
        Schema::table('music', function (Blueprint $table) {
            $table->dropColumn('duration');
        });
    }
};
