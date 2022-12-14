<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->increments('idAbsensi');
            $table->date('tanggal');
            $table->string('nama', 100);
			$table->string('jabatan', 20);
            $table->string('instansi', 100);
			$table->string('telp', 20);
            $table->string('tandatangan',200);
            $table->unsignedBigInteger('idRundowns');
            $table->foreign('idRundowns')->references('idRundowns')->on('rundowns')->onDelete('cascade');
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
        Schema::dropIfExists('absensis');
    }
}
