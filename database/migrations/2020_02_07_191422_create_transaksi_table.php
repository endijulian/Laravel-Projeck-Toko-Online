<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->Increments('kode_transaksi');
            $table->string('no_faktur')->index();
            $table->date('tanggal_penjualan');
            $table->unsignedInteger('kd_agen');
            $table->foreign('kd_agen')->references('kd_agen')->on('agen');
            $table->string('username', 100);
            $table->foreign('username')->references('username')->on('pegawai');
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->dropForeign(['kd_agen']);
            $table->dropForeign(['username']);
        });

        Schema::dropIfExists('transaksi');
    }
}
