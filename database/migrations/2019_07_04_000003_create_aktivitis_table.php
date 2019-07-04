<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktivitisTable extends Migration
{
    public function up()
    {
        Schema::create('aktivitis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama')->nullable();
            $table->longText('aturcara')->nullable();
            $table->datetime('tarikh_mula')->nullable();
            $table->datetime('tarikh_akhir')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
