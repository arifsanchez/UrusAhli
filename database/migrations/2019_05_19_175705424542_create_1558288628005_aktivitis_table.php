<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1558288628005AktivitisTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('aktivitis')) {
            Schema::create('aktivitis', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('bahagian_id')->nullable();
                $table->foreign('bahagian_id', 'bahagian_fk_61767')->references('id')->on('bahagians');
                $table->string('nama')->nullable();
                $table->longText('aturcara')->nullable();
                $table->unsignedInteger('jemputan_oleh_id')->nullable();
                $table->foreign('jemputan_oleh_id', 'jemputan_oleh_fk_61770')->references('id')->on('users');
                $table->datetime('tarikh_mula')->nullable();
                $table->datetime('tarikh_akhir')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('aktivitis');
    }
}
