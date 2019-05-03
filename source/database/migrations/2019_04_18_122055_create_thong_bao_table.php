<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThongBaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thong_bao', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tieude', 1000);
            $table->string('noidung', 10000);
            $table->integer('iduser')->unsigned();
            $table->integer('idnamhoc')->unsigned();
            $table->foreign('iduser')->references('id')->on('users');
            $table->foreign('idnamhoc')->references('id')->on('nam_hoc');
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
        Schema::dropIfExists('thong_bao');
    }
}
