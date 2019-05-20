<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1558234975873CawangansTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('cawangans')) {
            Schema::create('cawangans', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nama');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('cawangans');
    }
}
