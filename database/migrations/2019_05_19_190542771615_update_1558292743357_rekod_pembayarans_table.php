<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1558292743357RekodPembayaransTable extends Migration
{
    public function up()
    {
        Schema::table('rekod_pembayarans', function (Blueprint $table) {
            $table->unsignedInteger('diterima_oleh_id')->nullable();
            $table->foreign('diterima_oleh_id', 'diterima_oleh_fk_61936')->references('id')->on('users');
            $table->datetime('tarikh_transaksi')->nullable();
            $table->string('status_transaksi')->nullable();
        });
    }

    public function down()
    {
        Schema::table('rekod_pembayarans', function (Blueprint $table) {
        });
    }
}
