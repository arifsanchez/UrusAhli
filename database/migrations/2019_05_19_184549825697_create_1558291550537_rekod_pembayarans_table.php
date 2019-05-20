<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1558291550537RekodPembayaransTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('rekod_pembayarans')) {
            Schema::create('rekod_pembayarans', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('ahli_id')->nullable();
                $table->foreign('ahli_id', 'ahli_fk_61887')->references('id')->on('user_profiles');
                $table->string('tujuan_pembayaran')->nullable();
                $table->string('jenis_pembayaran')->nullable();
                $table->decimal('jumlah_pembayaran', 15, 2)->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('rekod_pembayarans');
    }
}
