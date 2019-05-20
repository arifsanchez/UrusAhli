<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1558234885721BahagiansTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('bahagians')) {
            Schema::create('bahagians', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nama');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('bahagians');
    }
}
