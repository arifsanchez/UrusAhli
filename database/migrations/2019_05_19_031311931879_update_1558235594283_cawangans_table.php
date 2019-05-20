<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1558235594283CawangansTable extends Migration
{
    public function up()
    {
        Schema::table('cawangans', function (Blueprint $table) {
            $table->unsignedInteger('bahagian_id')->nullable();
            $table->foreign('bahagian_id', 'bahagian_fk_61106')->references('id')->on('bahagians');
        });
    }

    public function down()
    {
        Schema::table('cawangans', function (Blueprint $table) {
        });
    }
}
