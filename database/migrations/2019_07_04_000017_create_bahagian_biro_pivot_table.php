<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBahagianBiroPivotTable extends Migration
{
    public function up()
    {
        Schema::create('bahagian_biro', function (Blueprint $table) {
            $table->unsignedInteger('biro_id');
            $table->foreign('biro_id', 'biro_id_fk_61101')->references('id')->on('biros');
            $table->unsignedInteger('bahagian_id');
            $table->foreign('bahagian_id', 'bahagian_id_fk_61101')->references('id')->on('bahagians');
        });
    }
}
