<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCawangansTable extends Migration
{
    public function up()
    {
        Schema::table('cawangans', function (Blueprint $table) {
            $table->unsignedInteger('bahagian_id')->nullable();
            $table->foreign('bahagian_id', 'bahagian_fk_61106')->references('id')->on('bahagians');
        });
    }
}
