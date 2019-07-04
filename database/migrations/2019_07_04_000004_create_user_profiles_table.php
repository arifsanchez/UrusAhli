<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jantina')->nullable();
            $table->string('phone_number')->nullable();
            $table->longText('alamat')->nullable();
            $table->string('nama_penuh');
            $table->string('no_kp')->nullable();
            $table->string('bangsa')->nullable();
            $table->string('status_perkahwinan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('jenis_keahlian')->nullable();
            $table->string('status_keahlian')->nullable();
            $table->string('no_ahli_cwg')->nullable();
            $table->string('no_ahli_bhg')->nullable();
            $table->date('tarikh_kelulusan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
