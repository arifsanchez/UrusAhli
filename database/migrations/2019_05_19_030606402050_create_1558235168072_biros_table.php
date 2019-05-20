<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1558235168072BirosTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('biros')) {
            Schema::create('biros', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nama')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('biros');
    }
}
