<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1558289369482UserProfilesTable extends Migration
{
    public function up()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->longText('alamat')->nullable();
        });
    }

    public function down()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
        });
    }
}
