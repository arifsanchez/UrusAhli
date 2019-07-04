<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUserProfilesTable extends Migration
{
    public function up()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->unsignedInteger('cawangan_id');
            $table->foreign('cawangan_id', 'cawangan_fk_61776')->references('id')->on('cawangans');
        });
    }
}
