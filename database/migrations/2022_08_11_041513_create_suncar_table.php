<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuncarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suncar', function (Blueprint $table) {
            $table->increments('idSuncar');
            $table->date('tanggal');
            $table->string('namaKegiatan', 100);
            $table->string('pj', 50);
            $table->time('waktuMulai');
            $table->time('waktuSelesai');
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
        Schema::dropIfExists('suncar');
    }
}
