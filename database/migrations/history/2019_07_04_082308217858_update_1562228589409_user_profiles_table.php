<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1562228589409UserProfilesTable extends Migration
{
    public function up()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->string('no_ahli_cwg')->nullable();
            $table->string('no_ahli_bhg')->nullable();
            $table->date('tarikh_kelulusan')->nullable();
        });
    }

    public function down()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
        });
    }
}
