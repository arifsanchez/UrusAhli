<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1558289006336UserProfilesTable extends Migration
{
    public function up()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->unsignedInteger('cawangan_id')->nullable();
            $table->foreign('cawangan_id', 'cawangan_fk_61776')->references('id')->on('cawangans');
        });
    }

    public function down()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
        });
    }
}
