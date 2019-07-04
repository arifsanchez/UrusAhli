<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAktivitisTable extends Migration
{
    public function up()
    {
        Schema::table('aktivitis', function (Blueprint $table) {
            $table->unsignedInteger('bahagian_id')->nullable();
            $table->foreign('bahagian_id', 'bahagian_fk_61767')->references('id')->on('bahagians');
            $table->unsignedInteger('jemputan_oleh_id')->nullable();
            $table->foreign('jemputan_oleh_id', 'jemputan_oleh_fk_61770')->references('id')->on('users');
        });
    }
}
