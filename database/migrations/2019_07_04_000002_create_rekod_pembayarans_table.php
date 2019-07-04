<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekodPembayaransTable extends Migration
{
    public function up()
    {
        Schema::create('rekod_pembayarans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tujuan_pembayaran')->nullable();
            $table->string('jenis_pembayaran')->nullable();
            $table->decimal('jumlah_pembayaran', 15, 2)->nullable();
            $table->datetime('tarikh_transaksi')->nullable();
            $table->string('status_transaksi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
