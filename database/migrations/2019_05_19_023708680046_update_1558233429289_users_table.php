<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1558233429289UsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('approved')->default(0)->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
        });
    }
}
