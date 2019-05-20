<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1558376891750UserProfilesTable extends Migration
{
    public function up()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->dropForeign('user_fk_61759');
            $table->dropColumn('user_id');
        });
        Schema::table('user_profiles', function (Blueprint $table) {
        });
    }

    public function down()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
        });
    }
}
