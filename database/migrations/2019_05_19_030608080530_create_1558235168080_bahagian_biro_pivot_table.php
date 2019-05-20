<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1558235168080BahagianBiroPivotTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('bahagian_biro')) {
            Schema::create('bahagian_biro', function (Blueprint $table) {
                $table->unsignedInteger('biro_id');
                $table->foreign('biro_id', 'biro_id_fk_61101')->references('id')->on('biros');
                $table->unsignedInteger('bahagian_id');
                $table->foreign('bahagian_id', 'bahagian_id_fk_61101')->references('id')->on('bahagians');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('bahagian_biro');
    }
}
