<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRekodPembayaransTable extends Migration
{
    public function up()
    {
        Schema::table('rekod_pembayarans', function (Blueprint $table) {
            $table->unsignedInteger('ahli_id')->nullable();
            $table->foreign('ahli_id', 'ahli_fk_61887')->references('id')->on('user_profiles');
            $table->unsignedInteger('diterima_oleh_id')->nullable();
            $table->foreign('diterima_oleh_id', 'diterima_oleh_fk_61936')->references('id')->on('users');
        });
    }
}
