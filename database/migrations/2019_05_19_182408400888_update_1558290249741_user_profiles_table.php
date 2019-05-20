<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1558290249741UserProfilesTable extends Migration
{
    public function up()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->string('nama_penuh');
            $table->string('no_kp')->nullable();
            $table->string('bangsa')->nullable();
            $table->string('status_perkahwinan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('jenis_keahlian')->nullable();
            $table->string('status_keahlian')->nullable();
        });
    }

    public function down()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
        });
    }
}
